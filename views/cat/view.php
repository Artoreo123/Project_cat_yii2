<?php
$_this = $this;
use kartik\detail\DetailView;
echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>$mode ? $mode : DetailView::MODE_VIEW,
    'deleteOptions'=> [
        'url' => 'delete',
        'params' => [
            'data_id' => $model->id,
            ],
        'ajaxSettings' => [
            'success' => new \yii\web\JsExpression("function(res){
                if(res.status){
                    window.location.href = 'index'
                }
            }"),
        ],
    ],
    'panel'=>[
        'heading'=>'Detail Cat # ' . $model->id,
        'type'=>DetailView::TYPE_INFO,
    ],
    'attributes'=>[
        'name',
        'type',
        'color',
        'weight',
        'price',
        [
            'attribute'=>'status',
            'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions' => [
                'data' => ['1' => 'ใช้งาน', '0' => 'ไม่ใช้งาน'],
                'hideSearch' => true,
            ]
        ],
        ['attribute'=>'birthday', 'type'=>DetailView::INPUT_DATETIME],
    ]
]);