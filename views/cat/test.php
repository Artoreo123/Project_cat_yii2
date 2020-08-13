<?php use richardfan\widget\JSRegister;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/css/test.css', ['depends' => [JqueryAsset::className()]]);
?>

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
<div class="cat-name">

</div>
<?php JSRegister::begin() ?>
<script>
    $.ajax({
        url: 'https://api.thecatapi.com/v1/breeds',
        method: 'GET',
        success: function (response) {
            let mea = $('.cat-name')
            response.forEach(function(cat) {
                // console.log(cat.name);
                mea.append(`<div class="look"><i class="far fa-square"></i> &nbsp; ${cat.name}</div>`)
            });
        }
    })
</script>
<?php JSRegister::end() ?>
