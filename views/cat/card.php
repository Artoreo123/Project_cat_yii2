<div class="card-container">
    <div class="detail-cat">
        <div class="name-cat">

            <?= $model->name ?> <br>
        </div>

        <div class="type-cat">

            Breeds:&nbsp;<?= $model->type ?><br>
        </div>
        <div class="weight-cat">

            Weight:&nbsp;<?= number_format($model->weight, 2) ?> KG<br>
        </div>
        <hr style="color: red">
        <div class="price-cat">

            <?= number_format($model->price, 2) ?> ฿<br>
        </div>
    </div>
    <img class="image-cat" src="<?= $model->image_path?>">

    <div class="div-bottom">
        <button class="addcart big-button" data-id="<?=$model->id?>">Buy</button>
    </div>
</div>