<?php
/* @var $this yii\web\View */

use richardfan\widget\JSRegister;

$total = 0;
?>

<table class="table table-bordered">
    <th>Name</th>
    <th>Type</th>
    <th>Color</th>
    <th>Weight</th>
    <th>Price</th>
    <tbody>
    <?php foreach ($datacat as $data){ ?>
    <tr>


        <td>
            <?php echo $data['name'] ?>
        </td>
        <td>
            <?php echo $data['type'] ?>
        </td>
        <td>
            <?php echo $data['color'] ?>
        </td>
        <td>
            <?php echo number_format($data['weight'],2) ?>
        </td>
        <td>
            <?php
            echo number_format($data['price'],2);
            $total += (int)$data['price']
            ?>
        </td>
    </tr>

    <?php } ?>
    </tbody>
    <tfoot>
    <tr>

        <th colspan="4" class="text-right">total</th>
        <th><?=number_format($total,2)?></th>

    </tr>
    </tfoot>
</table>

    <button type="button" class="confirm-buy btn btn-success"><i class="glyphicon glyphicon-usd"></i> Buy</button>

<?php JSRegister::begin(); ?>
<script>
    $(document).delegate('.confirm-buy','click',function () {
        window.location.href = UrlBase + 'cart/confirm'
    });
</script>
<?php JSRegister::end(); ?>

