<?php
use kartik\detail\DetailView;
echo DetailView::widget([
    'model'=>$datauser,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'buttons1' => '{update}', // set btn view mode
    'buttons2' => '{view} {save}', // set btn edit mode
    'panel'=>[
        'heading'=>' ' . $datauser->code,
        'type'=>DetailView::TYPE_INFO,
    ],
    'attributes'=>[
        'username',

        [
            'attribute'=>'email',
            'options' => [
                'readonly' => true,
            ]
    ],
////        'code',
    ]
]);