<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
$this->registerCssFile('@web/css/loading.css', ['depends' => [JqueryAsset::className()]]);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp1M0RYXk-6M6l0Ef5JuQxBz2OMsa42yg&callback=initMap&libraries=&v=weekly" defer></script>-->
<!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp1M0RYXk-6M6l0Ef5JuQxBz2OMsa42yg&callback=myMap"></script>-->
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
    JSRegister::begin();
    ?>

    <script>
        var _csrf = "<?= Yii::$app->request->csrfToken; ?>";
        var UrlBase = "<?=Yii::$app->homeUrl?>";
    </script>
    <?php
    JSRegister::end();
    ?>

</head>
<!--close view page     source-->
<body oncontextmenu="return false">

<?php $this->beginBody() ?>

<div class="wrap">

    <?php
//    if (Yii::$app->user->can('Admin')){
        NavBar::begin([
//            'brandLabel' => Yii::$app->name,
//            'brandUrl' => Yii::$app->homeUrl,
            'brandLabel' => 'Cat',
            'brandUrl' => '/cat/index',
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [


                Yii::$app->user->isGuest ? (['label' => 'Home', 'url' => ['/site/index']]
                ) : (""),
                Yii::$app->user->isGuest ? (['label' => 'About', 'url' => ['/site/about']]
                ) : (""),
                ['label' => 'Contact', 'url' => ['/site/contact'],'visible'=> Yii::$app->user->isGuest],
                ['label' => 'Dashboard', 'url' => ['/cat/dashboard'],'visible'=> Yii::$app->user->can("Admin")],
                ['label' => 'Graph', 'url' => ['/cat/graph'],'visible'=> Yii::$app->user->can("User")],
                ['label' => 'Profile', 'url' => ['/site/profile'],'visible'=> !Yii::$app->user->isGuest],
                Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();


//    }

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->


<div class="mea-img">
    <div class="look-img">
        <img class="style-img" src="../image/cat1.png" alt="Smiley face">

        <img class="style-img" src="../image/cat7.png" alt="Smiley face">

        <img class="style-img" src="../image/cat3.png" alt="Smiley face">
    </div>
    <div class="label-load">
        <p>Loading</p>
        <p>&nbsp;.</p>
        <p>&nbsp;.</p>
        <p>&nbsp;.</p>
    </div>
</div>


<?php $this->endBody() ?>
</body>
<?php JSRegister::begin(); ?>
<script>
    $(document).ready(function () {
        setTimeout(function(){
            $(".mea-img").fadeOut();
        },1500);
    })

    var animated = false;
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            // if(!animated){
            $('.navbar-fixed-top').css('top', '-50' + 'px')
            //     $('#contact').animate({
            //         left: 0
            //     }, 500 );
            //     animated = true;
            // }
        }
        else{
            $('.navbar-fixed-top').css('top', '0' + 'px')
        }
    })
    // else if(animated){
    //     $('.navbar-fixed-top').fadeOut();
    //     $('#contact').animate({
    //         left: -115
    //     }, 500 );
    //     animated = false;
    // }
</script>
<?php JSRegister::end(); ?>
</html>
<?php $this->endPage() ?>
