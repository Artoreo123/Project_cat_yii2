<?php

namespace app\controllers;

use app\models\Order;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDatadate()
    {
        $datadate = Order::find()->select(['count(id) as num','date'])->groupBy('date')->asArray()->all();

        $date = ArrayHelper::getColumn($datadate,'date');
        $num = ArrayHelper::getColumn($datadate,'num');

        print_r($date);
//        return Json::encode($datadate);
    }

}
