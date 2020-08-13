<?php
use richardfan\widget\JSRegister;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/css/cart.css', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.2/Chart.min.js', ['depends' => [JqueryAsset::className()]]);
?>
    <div class="container-fluid">
 <div class="row">
            <div class="col-md-6" style="height: 500px;background: whitesmoke">
                <canvas id="line-chart" width="100%" height="40%"></canvas>

            </div>
<!--     <div class="col-md-3 ">-->
<!--     </div>-->
            <div class="col-md-3 col-md-offset-3">
                <div class="dashboad-cat" >
                    แมวที่เหลือ : <?= $catstock?>
                </div>
            </div>
        </div>
    </div>
<?php JSRegister::begin(); ?>
<script>


    // line chart
    // var today = new Date("2020-09-05");
    // var dd = today.getDate()+1;
    // var mm = today.getMonth();
    // var yyyy = today.getFullYear();

    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels:
            <?php echo $dategraph; ?>
//                    foreach($dategraph as $result)
//                        echo '"'.$result.'"'.',';
//
            ,
            datasets: [{
                data:
                <?php echo $amount?>
                ,
                // label: "Sell Cat/Day",
                borderColor: "rgba(255, 99, 132, 1)",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'ยอดการสั่งซื้อในแต่ละวัน'
                // text: 'World population per region (in millions)'
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{

                    scaleLabel : {
                        display : true,
                        labelString : "จำนวน (ตัว)",
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    },
                }],
                xAxes: [{
                    scaleLabel : {
                        display : true,
                        labelString : "วันที่",

                    },
                }]
            },

        }
    });
</script>
<?php JSRegister::end(); ?>