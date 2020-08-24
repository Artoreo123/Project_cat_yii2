<?php


namespace app\controllers;


use app\Helper\Helper;
use app\models\Cart;
use app\models\Cat;
use app\models\Order;
use app\models\search\CatSearch;
use app\models\Test;
use Intervention\Image\ImageManagerStatic;
use kartik\detail\DetailView;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\Session;

//use yii\widgets\DetailView;

class CatController extends Controller
{
    public $format;
    public $count_cart;
    public function actions()
    {
        return [
            'avatar-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::className()
            ]
        ];
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index','dashboard'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['dashboard'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $searchModel = new CatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $iduser = Yii::$app->user->identity->id;

        //count row cart
        $count_cart = 0;

        $session = new Session;
        if($session['cart']){
            $count_cart = count($session['cart']);
        }
//        return Json::encode($dataProvider);
        return $this->render('index',[
            'searchModel' => $searchModel,
            'datacat' => $dataProvider,
            'count' => $count_cart,
        ]);
    }

    public function actionShowData($id)
    {
        $datacat = Cat::getDetail($id);
        return json_encode($datacat);

//        +++ how to call func non-static +++
//        $data = new Cat();
//        $data->id = $id;
//        return Json::encode($data->getDetail());

    }

    public function actionCreate()
    {
        $model = new Cat();

        // สุ่มเลข 6 หลัก
        $length = 6;
        $chars = array_merge(range(0,9));
        shuffle($chars);
        $code = implode(array_slice($chars, 0,$length));

        if($model->load(Yii::$app->request->post()))
        {
            $model->image_path = $model->image['base_url'].'/'.$model->image['path'];
            $model->image = $model->image['name'];

            $model->code = '#' . $code;
            $model->status = '1';

            if($model->save())
            {
                return $this->redirect('index');
            }
        }

        return $this->render('_form',[
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('view', [
                'mode' => DetailView::MODE_VIEW,
                'model' => $model,
            ]);
        }
        return $this->render('view', [
            'mode' => DetailView::MODE_VIEW,
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            try {
                $model->save();
                return $this->render('view', [
                    'mode' => DetailView::MODE_VIEW,
                    'model' => $model,
                ]);
            }catch (\Exception $e){
                return Json::encode([$model->errors,$e->getMessage()]);
            }

        }
        return $this->render('view', [
            'mode' => DetailView::MODE_EDIT,
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
//        $this->findModel($id)->delete();
//        return $this->redirect(['index']);
        $id = Yii::$app->request->post('data_id');
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($id){
            $model = $this->findModel($id);
            if ($model){
//                $model->status = 3;
                if($model->delete()){
                    return ['status' => true];
                }else{
                    return ['status' => false,'error'=>$model->errors];
                }
            }else{
                return ['status' => false,'error'=>$model->errors];
            }
        }else{
            return ['status' => false];
        }
    }

    protected function findModel($id)
    {
        if (($model = Cat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //cart
    public function actionCart()
    {
        $id = Yii::$app->request->post('data_id');
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($id) {
            $session = new Session;
//            $session->destroy();
            $session->open();
            $temp = [];
            $cart = $session['cart'];
            if ($cart) {
                $temp = $cart;
                $index = array_search($id, $temp);
                if (!is_numeric($index)) {
                    array_push($temp, $id);
                    $session['cart'] = $temp;

                }

            } else {
                array_push($temp, $id);
                $session['cart'] = $temp;
            }

            $session->close();
            return ['status' => true, 'session' => Yii::$app->session];
        }

        return ['status' => false];
    }
    public function actionGraph(){

        $catstock = Cat::find()->where(['status'=>1])->count();

        $datadate = Order::find()->select(['count(id) as num','DATE_FORMAT([[date]], "%d/%m/%Y") as date'])->groupBy('date')->asArray()->all();

        $dategraph = ArrayHelper::getColumn($datadate,'date');

        $amount = ArrayHelper::getColumn($datadate,'num');
        return $this->render('graph',[
            'catstock'=>$catstock,
            'dategraph' => Json::encode($dategraph),
            'amount' => Json::encode($amount),
            ]);
    }
    public function actionIncart(){
//        $session['cart'];
        return $this->redirect(['cart/index']);
    }

    public function actionTest(){
        return $this->render('test');
    }
    public function actionDashboard()
    {
        $data = Order::allDataOrder();
        $dataTypeCat = Order::getTypeCat();
        $dataMoney = Order::getDataForSummaryRevenue();
        $dataMoney = Json::encode($dataMoney);

        $dataTypeCatV2 = Helper::convertDataTypeCat($dataTypeCat);
        $dataTypeCatV2 = Json::encode($dataTypeCatV2);

        $dataConvert = Helper::convertData($data);
        $dataConvert = Json::encode($dataConvert);

//        return $dataMoney;
        return $this->render('dashboard', [
            'dataOrder' => $dataConvert,
            'dataTypeCat' => $dataTypeCatV2,
            'dataMoney' => $dataMoney,
        ]);
    }

//    public function actionDashboard()
//    {
//
//        $datenow = date('Y-m-d');
//        $monthnow = date('m');
//        $yearnow = date('Y');
//
//        $catstock = Cat::find()->where(['status'=>1])->count();
//
////        $datadate = Order::find()->select(['count(id) as num','DATE_FORMAT([[date]], "%d/%m/%Y") as date'])->where(['Month(date)'=>$monthnow])->groupBy('date')->asArray()->all();
////        $graphday = ArrayHelper::getColumn($datadate,'date');
////        $amount = ArrayHelper::getColumn($datadate,'num');
//
//        // money today
//        $data_order_graph_today = Order::find()->select(['count(id) as num'])
//            ->where(['DATE(date)'=>$datenow])
//            ->groupBy('DATE(date)')
//            ->asArray()
//            ->all();
//        $amount_order_today = ArrayHelper::getColumn($data_order_graph_today,'num');
//        $amount_order_today = Json::encode($amount_order_today);
//
//        $data_orderdt_graph_today = OrderDetail::find()->select(['count(id) as num','DATE_FORMAT([[created_at]], "%d/%m/%Y") as date'])
//            ->where(['DATE(created_at)'=>$datenow])
//            ->groupBy('DATE(created_at)')
//            ->asArray()
//            ->all();
//        $amount_orderdt_today = ArrayHelper::getColumn($data_orderdt_graph_today,'num');
//        $amount_orderdt_today = Json::encode($amount_orderdt_today);
//
//        // money daily
//        // ถ้าไม่ group by มันจะไม่แยกตามวันให้ แต่จะรวมกันเป็น 1 เดือน
//        $data_order_graph_day = Order::find()->select(['count(id) as num'])
//            ->where(['Month(date)'=>$monthnow])
//            ->groupBy('DATE(date)')
//            ->asArray()
//            ->all();
//        $amount_order_day = ArrayHelper::getColumn($data_order_graph_day,'num');
//        $amount_order_day = Json::encode($amount_order_day);
//
//        $data_orderdt_graph_day = OrderDetail::find()->select(['count(id) as num','DATE_FORMAT([[created_at]], "%d/%m/%Y") as date'])
//            ->where(['Month(created_at)'=>$monthnow])
//            ->groupBy('DATE(created_at)')
//            ->asArray()
//            ->all();
////        $datadate = OrderDetail::find()->select(['count(id) as num','DATE_FORMAT([[created_at]], "%d/%m/%Y") as date'])->groupBy('DATE(created_at)')->asArray()->all();
//        $graphday = ArrayHelper::getColumn($data_orderdt_graph_day,'date');
//        $amount_orderdt_day = ArrayHelper::getColumn($data_orderdt_graph_day,'num');
//
//        $today_earning = OrderDetail::find()->select(['sum(price) as total','type as type_cat_today','count(type) as count_type_cat_today','count(cat_id) as count_cat_sold_day'])
//            ->from('order_detail')
//            ->join('INNER JOIN', 'cat', 'order_detail.cat_id = cat.id')
//            ->where(['DATE(order_detail.created_at)'=> $datenow])
//            ->groupBy('cat.type') // ถ้าไม่ใส่ groupBy type cat จะออกมาแค่ 1 ตัว
//            ->asArray()
//            ->all();
//        //money
//        $money_day = ArrayHelper::getColumn($today_earning,'total');
//        $money_day = array_sum($money_day);
//
//        $cat_sold_day = ArrayHelper::getColumn($today_earning,'count_cat_sold_day');
//        $cat_sold_day = array_sum($cat_sold_day);
//
//        $type_cat_day = ArrayHelper::getColumn($today_earning,'type_cat_today');
//        $type_cat_day = Json::encode($type_cat_day);
//
//        $count_type_cat_day = ArrayHelper::getColumn($today_earning,'count_type_cat_today');
//        $count_type_cat_day = Json::encode($count_type_cat_day);
//        // money monthly
//        $data_order_graph_month = Order::find()->select(['count(id) as num'])->groupBy('Month(date)')->asArray()->all();
//        $amount_order_month = ArrayHelper::getColumn($data_order_graph_month,'num');
//        $amount_order_month = Json::encode($amount_order_month);
//
////        $datemonth = OrderDetail::find()->select(['count(id) as num','DATE_FORMAT([[created_at]], "%m/%Y") as month'])->where(['Year(created_at)'=>$yearnow])->groupBy('Month(created_at)')->asArray()->all();
//        $data_orderdt_graph_month = OrderDetail::find()->select(['count(id) as num','DATE_FORMAT([[created_at]], "%m/%Y") as month'])
//            ->groupBy('Month(created_at)')
//            ->asArray()
//            ->all();
//        $graphmonth = ArrayHelper::getColumn($data_orderdt_graph_month,'month');
//        $graphmonth = Json::encode($graphmonth);
//        $amount_orderdt_month = ArrayHelper::getColumn($data_orderdt_graph_month,'num');
//        $amount_orderdt_month = Json::encode($amount_orderdt_month);
//
//        $month_earning = OrderDetail::find()->select(['sum(price) as total','type as type_cat_month','count(type) as count_type_cat_month','count(cat_id) as count_cat_sold_month'])
//            ->from('order_detail')
//            ->join('INNER JOIN', 'cat', 'order_detail.cat_id = cat.id')
//            ->where(['Month(order_detail.created_at)'=> $monthnow])
//            ->groupBy('cat.type')
//            ->asArray()
//            ->all();
//        $money_month = ArrayHelper::getColumn($month_earning,'total');
//        $money_month = array_sum($money_month);
//
//        $cat_sold_month = ArrayHelper::getColumn($month_earning,'count_cat_sold_month');
//        $cat_sold_month = array_sum($cat_sold_month);
//
//        $type_cat_month = ArrayHelper::getColumn($month_earning,'type_cat_month');
//        $type_cat_month = Json::encode($type_cat_month);
//
//        $count_type_cat_month = ArrayHelper::getColumn($month_earning,'count_type_cat_month');
//        $count_type_cat_month = Json::encode($count_type_cat_month);
//
//        // money yearly
//        $data_order_graph_year = Order::find()->select(['count(id) as num'])
//            ->groupBy('Year(date)')
//            ->asArray()
//            ->all();
//        $amount_order_year = ArrayHelper::getColumn($data_order_graph_year,'num');
//        $amount_order_year = Json::encode($amount_order_year);
//
//        $data_orderdt_graph_year = OrderDetail::find()->select(['count(id) as num','DATE_FORMAT([[created_at]], "%Y") as year'])
//            ->groupBy('Year(created_at)')
//            ->asArray()
//            ->all();
//        $graphyear = ArrayHelper::getColumn($data_orderdt_graph_year,'year');
//        $graphyear = Json::encode($graphyear);
//        $amount_orderdt_year = ArrayHelper::getColumn($data_orderdt_graph_year,'num');
//        $amount_orderdt_year = Json::encode($amount_orderdt_year);
//
//        $year_earning = OrderDetail::find()->select(['sum(price) as total','type as type_cat_year','count(type) as count_type_cat_year','count(cat_id) as count_cat_sold_year'])
//            ->from('order_detail')
//            ->join('INNER JOIN', 'cat', 'order_detail.cat_id = cat.id')
//            ->where(['Year(order_detail.created_at)'=> $yearnow])
//            ->groupBy('cat.type')
//            ->asArray()
//            ->all();
//        $money_year = ArrayHelper::getColumn($year_earning,'total');
//        $money_year = array_sum($money_year);
//
//        $cat_sold_year = ArrayHelper::getColumn($year_earning,'count_cat_sold_year');
//        $cat_sold_year = array_sum($cat_sold_year);
//
//        $type_cat_year = ArrayHelper::getColumn($year_earning,'type_cat_year');
//        $type_cat_year = Json::encode($type_cat_year);
//
//        $count_type_cat_year = ArrayHelper::getColumn($year_earning,'count_type_cat_year');
//        $count_type_cat_year = Json::encode($count_type_cat_year);
//
//        // money total
//        $total_earning = OrderDetail::find()->select(['sum(price) as total','type as type_cat_total','count(type) as count_type_cat_total','count(cat_id) as count_cat_sold_total'])
//            ->from('order_detail')
//            ->join('INNER JOIN', 'cat', 'order_detail.cat_id = cat.id')
//            ->groupBy('cat.type')
//            ->asArray()
//            ->all();
//        $money_total = ArrayHelper::getColumn($total_earning,'total');
//        $money_total = array_sum($money_total);
//
//        $cat_sold_total = ArrayHelper::getColumn($total_earning,'count_cat_sold_total');
//        $cat_sold_total = array_sum($cat_sold_total);
//
//        $type_cat_total = ArrayHelper::getColumn($total_earning,'type_cat_total');
//        $type_cat_total = Json::encode($type_cat_total);
//
//        $count_type_cat_total = ArrayHelper::getColumn($total_earning,'count_type_cat_total');
//        $count_type_cat_total = Json::encode($count_type_cat_total);
//
//        return $this->render('contact', [
////            'model' => $model,
//            'catstock'=> $catstock,
//            'datenow' => $datenow,
//            'graphday' => Json::encode($graphday),
//            'graphmonth' => $graphmonth,
//            'graphyear' => $graphyear,
//            'amount_order_today' => $amount_order_today,
//            'amount_order_day' => $amount_order_day,
//            'amount_order_month' => $amount_order_month,
//            'amount_order_year' => $amount_order_year,
//            'amount_orderdt_today' => $amount_orderdt_today,
//            'amount_orderdt_day' => Json::encode($amount_orderdt_day),
//            'amount_orderdt_month' => $amount_orderdt_month,
//            'amount_orderdt_year' => $amount_orderdt_year,
//            'type_cat_day' => $type_cat_day,
//            'type_cat_month' => $type_cat_month,
//            'type_cat_year' => $type_cat_year,
//            'type_cat_total' => $type_cat_total,
//            'count_type_cat_day' => $count_type_cat_day,
//            'count_type_cat_month' => $count_type_cat_month,
//            'count_type_cat_year' => $count_type_cat_year,
//            'count_type_cat_total' => $count_type_cat_total,
//            'today_earning' => $money_day,
//            'month_earning' => $money_month,
//            'year_earning' => $money_year,
//            'total_earning' => $money_total,
//            'cat_sold_day' => $cat_sold_day,
//            'cat_sold_month' => $cat_sold_month,
//            'cat_sold_year' => $cat_sold_year,
//            'cat_sold_total' => $cat_sold_total,
////            'today_earning' => $today_earning[0]['total'],
////            'month_earning' => $month_earning[0]['total'],
////            'year_earning' => $year_earning[0]['total'],
////            'total_earning' =>$total_earning[0]['total'],
//        ]);
//    }


}