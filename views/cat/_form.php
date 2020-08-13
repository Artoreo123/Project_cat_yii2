<?php
//    echo \yii\helpers\Html::input('text','cat');
use kartik\date\DatePicker;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\web\JsExpression;


$form = ActiveForm::begin([
    'id' => 'login-form-vertical',
    'type' => ActiveForm::TYPE_VERTICAL
]);
?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'type') ?>
<?= $form->field($model, 'color') ?>
<?= $form->field($model, 'weight') ?>
<?= $form->field($model, 'birthday')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...',],
    'readonly' => true,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd HH:ii:ss',
        'autoclose' => true,

    ]
]); ?>
<?= $form->field($model, 'price') ?>
<?= $form->field($model, 'image')->widget(Upload::classname(), [
    'url' => ['avatar-upload'],
    'maxFileSize' => 5 * 1024 * 1024,
    'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
    'clientOptions' => [
// 'fail' => new JsExpression('function(e, data) { console.log(e);console.log(data); }'),
    ]
]) ?>


<!--//$form->field($model, 'status')->widget(Select2::classname(), [-->
<!--//    'data' => ['1' => 'ใช้งาน', '0' => 'ไม่ใช้งาน'],-->
<!--//    'options' => ['placeholder' => 'Select a state ...'],-->
<!--////    'hideSearch' => true,-->
<!--//    'pluginOptions' => [-->
<!--//        'allowClear' => true-->
<!--//    ],-->
<!--//]); -->

<div class="form-group">
    <div class="col-sm-offset-5">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('ล้างฟอร์ม', ['class' => 'btn btn-secondary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

