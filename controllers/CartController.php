<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Cat;
use app\models\Order;
use app\models\OrderDetail;
use app\models\search\CartSearch;
use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Session;
use yii\web\View;

class CartController extends \yii\web\Controller
{
//    public $datacat;
    public function actionIndex()
    {
        $session = new Session;
        if($session['cart']){

            $datacat = Cat::find()->where(['id'=> $session['cart']])->asArray()->all();
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
        $transaction = Yii::$app->db->beginTransaction();
        $flag = true;
        $session = new Session;
        if($session['cart']){
            try {
                Cat::updateAll(['status' => 0], ['id' => $session['cart']]);
//            $datacatOld = Cat::findall(['id'=> $session['cart']]);

                $Order = new Order();
                $Order->user_id = Yii::$app->user->identity->id;
                $Order->date = date("Y-m-d");
                if ($Order->save()) {
                    $array_idcat = $session['cart'];
                    foreach ($array_idcat as $item){
                        $model = new OrderDetail();
                        $model->order_id = $Order->id;
                        $model->created_at = date("Y-m-d H:i:s");
                        $model->cat_id = $item;
                        $model->created_by = Yii::$app->user->identity->id;
                        if (!$model->save()){
                            $flag = false;
                            echo Json::encode([$model->errors,$model]);
                            exit();
                        }
                    }

                }
                else{
                    $flag = false;
                }

                if ($flag){
                    $transaction->commit();
                    $session->destroy();
                    return $this->render('success');
                }
                else{
                    $transaction->rollBack();

                    return $this->redirect('index');
                }
            }catch (\Exception $e){
                $transaction->rollBack();
                return Json::encode($e->getMessage());
//                return $this->redirect('index');
            }
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
