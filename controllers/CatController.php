<?php


namespace app\controllers;


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
                'only'  => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
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


}