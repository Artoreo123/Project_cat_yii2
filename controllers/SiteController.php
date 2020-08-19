<?php

namespace app\controllers;

use app\Helper\Helper;
use app\models\Cat;
use app\models\Order;
use app\models\OrderDetail;
use app\models\User;
use kartik\detail\DetailView;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {;
            if ($model->login()){
                if(Yii::$app->user->can('Admin')){
                    return $this->redirect(['cat/index']);
                }else{
                    return $this->redirect(['cat/index']);// ถ้ามีก้ามปู [controller/view]
                }
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $data = Order::allDataOrder();
        $dataConvert = Helper::convertData($data);
        $dataConvert = Json::encode($dataConvert);
//        return $dataConvert;
        return $this->render('contact', [
            'dataOrder' => $dataConvert,
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
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->status = User::STATUS_ACTIVE;
            // สุ่มตัวหนังสือ 6 หลัก
            $model->code = '@' . Yii::$app->security->generateRandomString(6);
//            return Json::encode($model);

            if ($model->save()) {

                // เพิ่มสิทธิเป็น user
                $auth = \Yii::$app->authManager;
                $authorRole = $auth->getRole('User');
                $auth->assign($authorRole, $model->getId());

                return $this->redirect(['login']);
            }
            return $this->redirect(['register']);
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionView()
    {
//        $model = $this->findModel();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->render('view', [
//                'mode' => DetailView::MODE_VIEW,
//                'model' => $model,
//            ]);
//
//        }
//        $user = Yii::$app->user->username;
        $user = Yii::$app->user->identity;
//        return Json::encode($user);
        return $this->render('view', [
            'user' => $user,
        ]);
//        return Json::encode($model);
    }
    public function actionProfile(){

        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('profile', [
                'mode' => DetailView::MODE_VIEW,
                'datauser' => $model,
            ]);
        }
        return $this->render('profile', [
            'mode' => DetailView::MODE_VIEW,
            'datauser' => $model,
        ]);
    }
}
