<?php

use app\helper\Helper;
use app\models\Cat;
use kartik\widgets\ActiveForm;
use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use kartik\grid\GridView;


/* @var $datacat ; */
/* @var $searchModel ; */
/* @var $format ; */

$this->registerJsFile('@web/js/main.js', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('@web/css/cart.css', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', ['depends' => [JqueryAsset::className()]]);
//$this->registerCssFile('@web/css/card1.css', ['depends' => [JqueryAsset::className()]]);
//$this->registerCssFile('@web/css/card2.css', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('@web/css/mycard.css', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,600i&display=swap', ['depends' => [JqueryAsset::className()]]);


//$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.2/Chart.css', ['depends' => [JqueryAsset::className()]]);
?>


    <div class="container-fluid">


        <?php if (Yii::$app->user->can("Admin")) {
            echo Html::a('Create', ['create'], ['class' => 'btn-create btn']);
        }
        ?>

        <?php Pjax::begin([
            'id' => 'pjax-test'
        ]); ?>

        <?php $form = ActiveForm::begin(
            [
                'id' => 'test-form'
            ]
        );

        // search +++
        echo $form->field($searchModel, 'search', [
            'addon' => [
                'append' => [
                    'options' => ['id' => 'test-search'],
                    'content' => Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-primary']),
                    'asButton' => true
                ]
            ]
        ]);
        ActiveForm::end(); ?>
        <?php if (Yii::$app->user->can("Admin")) { ?>
            <?= GridView::widget([
                'dataProvider' => $datacat,
//        'filterModel' => $searchModel, // ++++++++ search in column
                'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//                [
//                    'attribute' => 'id',
//                    'headerOptions' => ['style' => 'min-width:100px'],
//                    'filterType' => GridView::FILTER_SELECT2,
//                    'filter' => Cat::getIdTestSelect(),
//                    'filterWidgetOptions' => [
//                        'pluginOptions' => ['allowClear' => true],
//                    ],
//                    'filterInputOptions' => ['placeholder' => 'กรุณาเลือก'],
//                    'format' => 'raw',
////                'value' => function ($model) {
////                    return $model['name'];
////                },
//                    'label' => 'หมายเลข',
//                ],
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style' => 'width:30px'],
//                        'visible' => (Yii::$app->user->can("Admin")),
                    ],
                    [
                        'attribute' => 'code',
                        'headerOptions' => ['style' => 'width:80px'],
//                        'visible' => (Yii::$app->user->can("Admin")),
                    ],
                    [
                        'attribute' => 'image',
                        'headerOptions' => ['style' => 'width:100px'],
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::img($model->image_path, ['style' => 'width:70px;height:80px']);
                        }
                    ],
                    'name',
                    'type',
                    'color',

                    [
                        'attribute' => 'weight',
                        'headerOptions' => ['style' => 'width:100px'],
                        'value' => function ($model) {
                            return number_format($model->weight, 2, ".", ",") . ' kg';
                        }
                    ],
                    [
                        'attribute' => 'price',
                        'headerOptions' => ['style' => 'width:60px'],
                        'value' => function ($model) {
                            return number_format($model->price, 2, ".", ",");
                        }
                    ],
//            [
//                'attribute' => 'birthday',
//                'headerOptions' => ['style' => 'min-width:135px;width:135px'],
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return Helper::changeDateFormat($model->birthday);
//                }
//            ],
                    [
//                'header' => '<div style="color: #333b4d">วันที่เปิดปิดรับสมัคร</div>',
                        'attribute' => 'birthday',
                        'headerOptions' => ['style' => 'width:120px'],
                        'format' => 'html',
                        'filter' => \kartik\widgets\DatePicker::widget([
                            'attribute' => 'birthday',
                            'model' => $searchModel,
                            'language' => 'th',
                            'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
                            'options' => ['placeholder' => 'ค้นหา',
                                'style' => 'z-index:10000',
                                'autocomplete' => 'off'], //*****
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'format' => 'dd/mm/yyyy',
                                'orientation' => 'bottom left',
                            ],
                        ]),
                        'value' => function ($model) {
                            return Helper::changeDateFormat($model->birthday);
                        }
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'ดำเนินการ',
                        'headerOptions' => ['style' => 'text-align: center;width:90px;min-width:90px'],
                        'template' => '<div class="btn-group btn-group-sm text-center" style="display: block;text-align: center;" role="group">{view} {update} {delete}</div>',
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<i class="glyphicon glyphicon-eye-open blue"></i>', ['view', 'id' => $model->id], [
                                    'style' => 'margin:0px 3px',
                                ]);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<i class="glyphicon glyphicon-pencil green"></i>', ['update', 'id' => $model->id], [
                                    'style' => 'margin:0px 3px',
                                ]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="glyphicon glyphicon-trash red"></i>', 'javascript:;', [
                                    'class' => 'delete',
                                    'data-id' => $model->id,
                                    'style' => 'margin:0px 3px',
                                ]);
                            }
                        ],
//                        'visible' => (Yii::$app->user->can("Admin")),
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'ดำเนินการ',
                        'headerOptions' => ['style' => 'text-align: center;width:90px;min-width:90px'],
                        'template' => '<div class="btn-group btn-group-sm text-center" style="display: block;text-align: center;" role="group">{addcart}</div>',
                        'buttons' => [
                            'addcart' => function ($url, $model, $key) {
                                return Html::a('<i class="glyphicon glyphicon-shopping-cart green"></i>', 'javascript:;', [
                                    'class' => 'addcart',
                                    'style' => 'margin:0px 3px',
                                    'data-id' => $model->id,
                                ]);
                            },
                        ],
//                        'visible' => (Yii::$app->user->can("User")),
                    ],
//                [
//                    'attribute' => 'id',
//                    'headerOptions' => ['style' => 'width:100px'],
//                    'format' => 'raw',
//                    'value' => function ($model) {
//                        $idcat = $model->id;
//                        return Html::a('<i class="glyphicon glyphicon-plus"></i> add cart', ['cart/addcart','idcat'=>$idcat ], ['class' => 'btn btn-success']);
//                    },
//                    'visible' => (!Yii::$app->user->can("Admin")),
//                ],
//                [
//                    'class' => 'yii\grid\ActionColumn',
//                    'headerOptions' => ['style' => 'width:80px'],
//
//                    'visible' => (Yii::$app->user->can("Admin")),
//                ],
                ],
            ]); ?>
        <?php } ?>

        <?php if (Yii::$app->user->can("User")) { ?>

            <?= ListView::widget([
                'dataProvider' => $datacat,
                    'itemView' => 'card',
                'layout'=>'<div class="none-sum">{items}</div>',

            ])?>

        <?php } ?>

        <?php if (Yii::$app->user->can("User")) { ?>
            <div id="cart-index" class="demo cart">
<!--                <button class="big-button demo cart cart-index">-->
                <i class="glyphicon glyphicon-shopping-cart" style="font-size: 50px;color: #28a745"></i>
                <?= $count != 0 ? "<div class='count-row-cart'>" . $count . "</div>" : "" ?>
<!--                </button>-->
            </div>
        <?php } ?>

        <?php Pjax::end(); ?>

    </div>
<?php JSRegister::begin(); ?>
    <script>

        $(document).delegate('.delete','click',function () {
            let data_id = $(this).attr('data-id');
            // console.log(data_id);
            $.ajax({
                    url: 'delete',
                method: 'POST',
                data:{
                    _csrf,
                    data_id,
                },
                success: function (response) {
                    if (response.status){
                        $.pjax.reload({
                            container: '#pjax-test',
                            'timeout': 5000,
                        }).done(function () {
                            alert('delete ' +data_id+ ' OK');
                        })
                    }else {
                        alert('Cant delete ' + data_id);
                    }
                },
                error: function (response) {
                    alert('Cant delete ' +data_id);
                }
            })
        });
        $(document).delegate('.addcart','click',function () {
            let data_id = $(this).attr('data-id');
            // console.log(data_id);
            $.ajax({
                url: 'cart',
                method: 'POST',
                data:{
                    _csrf,
                    data_id,
                },
                success: function (response) {
                    if (response.status){
                        $.pjax.reload({
                            container: '#pjax-test',
                            'timeout': 5000,
                        }).done(function () {
                            alert('Add cat in cart ' +data_id+ ' OK');
                        })
                    }else {
                        alert('Cant Add ' + data_id);
                    }
                },
                error: function (response) {
                    alert('Cant Add ' +data_id);
                }
            })
        });

        $(document).delegate('#test-form', 'submit', function (e) {
            e.preventDefault()
            let this_value = $('#catsearch-search').val();
            let url = updateQueryStringParameter(window.location.href, 'search', this_value);
            $.pjax.reload({container: '#pjax-test', url: url, 'timeout': 5000, async: false});
        });

        var incart = '<?= $count ?>'
        $(document).delegate('#cart-index','click',function () {
            if (incart === '0'){
                alert('Please choose cat !!')
            }
            else {
                window.location.href = UrlBase + 'cat/incart'
            }

        });
        // window.onscroll = function() {
        //     scrollFunction()
        // };
        // function scrollFunction() {
        //     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //         $('.navbar-fixed-top').style.top = "0";
        //     } else {
        //         $('.navbar-fixed-top').style.top = "-50px";
        //     }
        // }

    </script>
<?php JSRegister::end(); ?>