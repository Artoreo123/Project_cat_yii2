<?php use richardfan\widget\JSRegister;
use yii\web\JqueryAsset;

//$this->registerCssFile('@web/css/test.css', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('@web/css/testmenu.css', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('@web/css/grid.css', ['depends' => [JqueryAsset::className()]]);

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.2/Chart.min.js', ['depends' => [JqueryAsset::className()]]);

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
<div id="chart">
    <div class="grid-flex grid-justify-end grid-align-center grid-width-100">
        <div class="label-menu"style="padding-right: 10px;font-size: 18px;font-weight: 600"></div>
        <div class="testttt">
            <div class="testttt2" style="position: absolute">
                <i class="fas fa-ellipsis-h" style="transform: rotate(90deg);"></i>
            </div>
            <div class="select-menu-test grid-flex grid-col">
                <div class="in-menu active" data-index="daily"><i class="fas fa-plus" style="padding-right: 15px"></i> daily </div>
                <div class="in-menu" data-index="monthly"><i class="fas fa-plus" style="padding-right: 15px"></i> monthly </div>
                <div class="in-menu" data-index="yearly"><i class="fas fa-plus" style="padding-right: 15px"></i> yearly </div>
            </div>
        </div>
    </div>
    <div class="" style="background: white;border-radius: 20px;padding: 20px">
        <canvas id="line-chart" class="bg-charts grid-flex-1" width="70%" height="50%"></canvas>
    </div>
    <div class="search">
        <div class="default-div  grid-flex grid-justify-between grid-width-100 grid-align-center">
            <div class="label-search">
                อำเภอ
            </div>
            <i class="fas fa-plus"></i>
        </div>
        <div class="when-click grid-width-100 grid-height-100 display-none">
            <i class="icon-search fa fa-search"></i>
            <input class="input-search grid-flex grid-align-center grid-width-100 grid-height-100" type="text" placeholder="..."/>

        </div>

    </div>

</div>



<?php JSRegister::begin() ?>

<script>
    $(document).delegate('.default-div', 'click', function () {

        $(this).addClass('display-none')
        $(this).removeClass('grid-flex')
        $('.when-click').removeClass('display-none')
    });
    $(document).delegate('.when-click', 'click', function () {
        $(this).addClass('display-none')
        $('.default-div').removeClass('display-none')
        $('.default-div').addClass('grid-flex')
    });


    // DataGraph
    var dataOrder = '<?= $dataOrder ?>'
    var alldataTypeCat = '<?= $dataTypeCat ?>'
    var dataMoney = '<?= $dataMoney ?>'

    var dataJson = JSON.parse(dataOrder)
    var dataJsonTypeCat = JSON.parse(alldataTypeCat)
    var dataJsonMoneyCat = JSON.parse(dataMoney)

    var dataCatAll = ''
    var dataOrderAll = ''
    var labelAll = ''

    //Time today
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = dd + '/' + mm + '/' + yyyy;

    $(document).ready(function () {

    })
    $(document).delegate('.testttt', 'click', function () {
        $(this).toggleClass('show-menu');
    });

    const dataForYearly = function(data) {
        let returnLabelYear = []
        let returnDataOrderYear = []
        let returnDataCatYear = []

        // if (data) {
        Object.keys(data).forEach(function (item, key) {
            returnLabelYear.push(item) // label year
            let cat_amount_year = 0
            let order_amount_year = 0
            Object.keys(data[item]).forEach(function (itemMonth, key) {
                Object.keys(data[item][itemMonth]).forEach(function (itemDay, key) {

                    cat_amount_year += parseInt(data[item][itemMonth][itemDay].amount_cat)
                    order_amount_year += parseInt(data[item][itemMonth][itemDay].amount_order)
                })
            })
            // returnDatasetYear.push([order_amount_year,cat_amount_year])
            returnDataOrderYear.push(order_amount_year)
            returnDataCatYear.push(cat_amount_year)
        })
        // }
        return {label_year: returnLabelYear, Order_year: returnDataOrderYear , Cat_year: returnDataCatYear}
    }
    const dataForMonthly = function(data) {
        let returnLabelMonth = []
        let returnDataOrderMonth = []
        let returnDataCatMonth = []
        // if (data) {
        Object.keys(data).forEach(function (item, key) {
            Object.keys(data[item]).forEach(function (itemMonth, key) {
                // returnLabelMonth.push(itemMonth) // label year
                let cat_amount_Month = 0
                let order_amount_Month = 0
                Object.keys(data[item][itemMonth]).forEach(function (itemDay, key) {
                    cat_amount_Month += parseInt(data[item][itemMonth][itemDay].amount_cat)
                    order_amount_Month += parseInt(data[item][itemMonth][itemDay].amount_order)
                    if (returnLabelMonth.indexOf(data[item][itemMonth][itemDay].text_month) == -1){ // ถ้ายังไม่มีข้อมูลเหมือนตัวที่ส่งเข้าไปใน array indexOf จะส่งค่า -1 กลับมา
                        returnLabelMonth.push(data[item][itemMonth][itemDay].text_month);
                    }
                })
                returnDataOrderMonth.push(order_amount_Month)
                returnDataCatMonth.push(cat_amount_Month)
            })
        })
        // }
        return {label_month: returnLabelMonth, Order_month: returnDataOrderMonth , Cat_month: returnDataCatMonth}
    }

    const dataForDaily = function(data) {
        let returnDataLabelDay = []
        let returnDataOrderDay = []
        let returnDataCatDay = []

        Object.keys(data[yyyy][mm]).forEach(function (itemDay, key) {
            let cat_amount_Day = 0
            let order_amount_Day = 0

            returnDataLabelDay.push(data[yyyy][mm][itemDay].text_date) // label day
            returnDataOrderDay.push(parseInt(data[yyyy][mm][itemDay].amount_order))
            returnDataCatDay.push(parseInt(data[yyyy][mm][itemDay].amount_cat))
        })

        return {label_day: returnDataLabelDay, Order_day: returnDataOrderDay , Cat_day:returnDataCatDay}
    }
    var testdataYearly = dataForYearly(dataJson);
    var testdataMonthly = dataForMonthly(dataJson);
    var testdataDaily = dataForDaily(dataJson);

    var ctx1 = document.getElementById("line-chart").getContext("2d");

    window.gradientFillCat = ctx1.createLinearGradient(0, 0, 0, 850);
    gradientFillCat.addColorStop(0, "rgba(255,166,43,0.98)");
    gradientFillCat.addColorStop(1, "rgba(255, 255, 255, 0)");

    window.gradientFillOrder = ctx1.createLinearGradient(0, 0, 0, 850);
    gradientFillOrder.addColorStop(0, "#16697afa");
    gradientFillOrder.addColorStop(1, "rgba(255, 255, 255, 0)");

    var titlechart = 'Daily summaraize sale'
    var labelUnderGraph = 'To Day'
    var initailOption = {
        type: 'bar',
        data: {
            labels:
            testdataDaily.label_day
            ,
            datasets: [{
                label: "Order",
                data: testdataDaily.Order_day,
                //echo $amount_order_today

                borderWidth: 3,
                borderColor: "#16697a",
                fill: true,
                backgroundColor: gradientFillOrder,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                spanGaps: true,
                lineTension: 0.3,
            }, {
                label: "Cat Sold",
                data: testdataDaily.Cat_day,
                // echo $amount_orderdt_today?>
                borderWidth: 3,
                borderColor: "#ffa62b",
                fill: true,
                backgroundColor: gradientFillCat,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                spanGaps: false,
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: titlechart
            },
            legend: {
                display: true,
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawOnChartArea: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Number of cats (ตัว)",
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    },
                }],
                xAxes: [{
                    gridLines: {
                        drawOnChartArea: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: labelUnderGraph,
                    },
                }]
            },
            responsive: true,
            tooltips: {
                mode: 'point',
            },
        }
    }
    var testchart = new Chart(document.getElementById("line-chart"), initailOption);
    $(document).delegate('.in-menu', 'click', function () {
        let data_index = $(this).attr('data-index');
        $('.in-menu').removeClass('active')
        $(this).addClass('active')

        // testchart.destroy()
        if (data_index == 'daily'){
            $('.label-menu').text('daily')
            dataCatAll = testdataDaily.Cat_day
            dataOrderAll = testdataDaily.Order_day
            labelAll = testdataDaily.label_day;
            titlechart = 'Daily summaraize sale'
            labelUnderGraph = 'To Month'
        }
        else if(data_index == 'monthly'){
            $('.label-menu').text('monthly')
            dataCatAll = testdataMonthly.Cat_month
            dataOrderAll = testdataMonthly.Order_month
            labelAll = testdataMonthly.label_month;
            titlechart = 'Monthly summaraize sale'
            labelUnderGraph  = 'To Year'
        }
        else if(data_index == 'yearly'){
            $('.label-menu').text('yearly')
            dataCatAll = testdataYearly.Cat_year
            dataOrderAll = testdataYearly.Order_year
            labelAll = testdataYearly.label_year
            titlechart = 'Yearly summaraize sale'
            labelUnderGraph = 'All the time'

        }
        initailOption.data = {
            ...initailOption.data, // คือการเอาค่าที่ไไม่มีการเปลี่ยนแปลงทั้งหมดมาด้วย หรือ ดึง stlye กราฟเดิมมา
            labels: labelAll,
            datasets: [
                {
                    ...initailOption.data.datasets[0], // คือการเอาค่าที่ไไม่มีการเปลี่ยนแปลงทั้งหมดมาด้วย หรือ ดึง stlye กราฟเดิมมา
                    data: dataOrderAll
                },
                {
                    ...initailOption.data.datasets[1],
                    data: dataCatAll
                }
            ],
        }
        initailOption.options = {
            ...initailOption.options,
            title: {
                display: true,
                text: titlechart
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: labelUnderGraph,
                    },
                }]
            },
        }
        testchart.data = initailOption.data
        testchart.options = initailOption.options
        testchart.update();
    })


    // $('.navbar-inverse').onscroll = function() {
    //     scrollFunction()
    // };
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $('.navbar-inverse').style.top = "0";
        } else {
            $('.navbar-inverse').style.top = "-50px";
        }
    }

</script>
<?php JSRegister::end() ?>
