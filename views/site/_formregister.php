<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

///* @var $this yii\web\View*/
/* @var $model app\models\User*/
/* @var $form yii\widgets\ActiveForm*/
?>



<div class="test-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>


</div>


