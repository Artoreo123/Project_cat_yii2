<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $this app\models\User */

$this->title = 'Register';
//$this->params['breadcrumbs'][] = ['label' => 'Register', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-register">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formregister', [
        'model' => $model,
    ]) ?>


</div>
