<?php

namespace app\controllers;

use app\models\Cat;
use app\models\Order;
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
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//            return $this->refresh();
//        }
        $catstock = Cat::find()->where(['status'=>1])->count();

        $datadate = Order::find()->select(['count(id) as num','DATE_FORMAT([[date]], "%d/%m/%Y") as date'])->groupBy('date')->asArray()->all();

        $dategraph = ArrayHelper::getColumn($datadate,'date');

        $amount = ArrayHelper::getColumn($datadate,'num');
//        return Json::encode($amount);

        return $this->render('contact', [
//            'model' => $model,
            'catstock'=> $catstock,
            'dategraph' => Json::encode($dategraph),
            'amount' => Json::encode($amount),
        ]);
    }

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
