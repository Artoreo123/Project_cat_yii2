<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Cat;
use app\models\Order;
use app\models\search\CartSearch;
use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Session;

class CartController extends \yii\web\Controller
{
//    public $datacat;
    public function actionIndex()
    {
        $session = new Session;
        if($session['cart']){

            $datacat = Cat::find()->where(['id'=> $session['cart']])->asArray()->all();
//            return Json::encode($datacat);
            return $this->render('index',[
                'datacat'=>$datacat,
            ]);
        }

        return $this->render('index');
    }

    protected function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionConfirm(){

        $session = new Session;
        if($session['cart']){
            Cat::updateAll(['status'=> 0],['id'=> $session['cart']]);
//            $datacatOld = Cat::findall(['id'=> $session['cart']]);

            $Order = new Order();
            $Order->user_id = Yii::$app->user->identity->id;
            $Order->date = date("Y-m-d");
            if($Order->save()){
                $session->destroy();

                return $this->render('success');
            }
            return Json::encode($Order);

        }


    }

    public function actionAddcart($idcat)
    {
//        return $idcat;
        $model = new Cart();

        $model->user_id = Yii::$app->user->identity->id;
        $model->cat_id = $idcat;
        $model->date =
        $model->status = User::STATUS_ACTIVE; //1


        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

}
