<?php use richardfan\widget\JSRegister;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/css/test.css', ['depends' => [JqueryAsset::className()]]);
?>
<!--<div id="map"></div>-->
<!--<div class="all">-->
<!--    <div class="lefter">-->
<!--        <div class="text">Cat</div>-->
<!--    </div>-->
<!--    <div class="left">-->
<!--        <div class="text">Cart</div>-->
<!--    </div>-->
<!--    <div class="center">-->
<!--        <div class="explainer"><span>Touch me</span></div>-->
<!--        <div class="text">Frontend Development</div>-->
<!--    </div>-->
<!--    <div class="right">-->
<!--        <div class="text">Backend Development</div>-->
<!--    </div>-->
<!--    <div class="righter">-->
<!--        <div class="text">Search</div>-->
<!--    </div>-->
<!--</div>-->

<!--<a href="https://jouanmarcel.com" target="_blank" class="ref">🔗 Jouan Marcel</a>-->
<!---->
<!--<div id="navbar">-->
<!---->
<!--</div>-->

<?php JSRegister::begin() ?>

<script>
    $('.navbar-inverse').onscroll = function() {
        scrollFunction()
    };
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $('.navbar-inverse').style.top = "0";
        } else {
            $('.navbar-inverse').style.top = "-50px";
        }
    }

</script>
<?php JSRegister::end() ?>
