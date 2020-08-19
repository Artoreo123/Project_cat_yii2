<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use richardfan\widget\JSRegister;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\web\JqueryAsset;


//$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', ['depends' => [JqueryAsset::className()]]);
//$this->registerCssFile('https://use.fontawesome.com/releases/v5.13.0/css/all.css', ['depends' => [JqueryAsset::className()]]);

$this->registerCssFile('@web/css/grid.css', ['depends' => [JqueryAsset::className()]]);
$this->registerCssFile('@web/css/dashboard.css', ['depends' => [JqueryAsset::className()]]);
//$this->registerJsFile('https://canvasjs.com/assets/script/canvasjs.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.2/Chart.min.js', ['depends' => [JqueryAsset::className()]]);
?>
<div class="grid-flex site-contact">
    <div class="grid-flex grid-flex-1">

        <div class="area-1 grid-flex-2 pl-4 pt-2 pr-2 pb-4">
            <div class="grid-flex">
                <div class="div-logo"></div>
                <div class="grid-flex grid-width-100">
                    <div class="grid-flex grid-flex-1 grid-height-100 pr-2">
                        <div class="grid-flex grid-justify-end grid-width-100">
                            <div class="grid-flex grid-align-center grid-height-100">
                                <div class="grid-flex grid-justify-center menu-item menu-active" data-index="0">
                                    Overview
                                </div>
                                <div class="grid-flex grid-justify-center menu-item" data-index="1">
                                    Reports
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="search grid-flex grid-flex-1 grid-align-center grid-height-100">
                        <input class="input-search grid-width-100 grid-height-100 pl-2 pr-3" type="text" placeholder="Search Rooms"/>
                        <!--                        <div class="search grid-flex grid-align-center grid-width-100 grid-height-100 pl-2 pr-1">-->
                        <!--                            <div class="grid-flex grid-justify-start grid-width-100">Search Rooms-->
                        <!--                            </div>-->
                        <!--                            <div class="grid-flex grid-justify-end grid-width-100">-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <i class="icon-search fa fa-search"></i>
                    </div>
                </div>
            </div>

            <!--            switch tab -->
            <div class="switch-tab-x">
                <div class="switch-tab-view">
                    <!--            menu 1 -->
                    <div class="switch-tab-content grid-flex grid-col">

                        <div class="grid-flex grid-width-100 grid-align-center pt-3 pr-2">

                            <div class="main-dashboard grid-flex grid-flex-1 grid-justify-start">
                                Main Dashboard
                            </div>
                            <div class="grid-flex grid-flex-1 grid-align-center grid-justify-end">
                                <div class="manage-dropdown grid-flex pr-0">
                                    Manage&nbsp;
                                    <i class="fa fa-chevron-down" aria-hidden="true" style="color: #459089;"></i>
                                    <div class="select-menu grid-flex grid-col">
                                        <div class="in-select-menu grid-flex grid-justify-between">Add <i class="fas fa-plus"></i></div>
                                        <div class="in-select-menu grid-flex grid-justify-between">Edit <i class="fas fa-pencil-alt"></i></div>
                                        <div class="in-select-menu grid-flex grid-justify-between">Delete <i class="fas fa-trash-alt"></i></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="grid-flex grid-width-100 grid-align-center pt-1 pr-2">
                            <div class="grid-flex grid-align-center grid-justify-start grid-height-100">
                                <div class="grid-flex grid-justify-center menu-dashboard-overview menu-dashboard-overview-first menu-active" data-index-small-menu-overview ="0">
                                    Booking
                                </div>
                                <div class="grid-flex grid-justify-center menu-dashboard-overview" data-index-small-menu-overview ="1">
                                    Amenities
                                </div>
                                <div class="grid-flex grid-justify-center menu-dashboard-overview" data-index-small-menu-overview ="2">
                                    Customization
                                </div>
                                <div class="grid-flex grid-justify-center menu-dashboard-overview" data-index-small-menu-overview ="3">
                                    Locality
                                </div>
                            </div>
                        </div>

<!--                        <div class="switch-tab-x-small-overview">-->
<!--                            <div class="switch-tab-view-small-overview">-->
<!--                                <div class="switch-tab-content-small-overview grid-flex grid-col">-->
                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex grid-flex-4">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex grid-flex-1 mr-1">
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1">
                                                        <div class="grid-flex grid-col">
                                                            <div class="text-earning grid-flex">
                                                                Today's Earning
                                                            </div>
                                                            <div class="grid-flex">
                                                                $2890
                                                            </div>
                                                            <div class="grid-flex">
                                                                <img src="../image/graph.png" alt="Graph"
                                                                     style="width: 95px;height: 30px">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="demographics grid-flex grid-flex-1 grid-justify-center grid-align-center p-1">
                                                        <div class="grid-flex grid-col">
                                                            <div class="grid-flex text-demographics">
                                                                Demographics
                                                            </div>
                                                            <div class="grid-flex number-demographics grid-justify-center">
                                                                20
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex grid-flex-1">
                                                    <div class="grid-flex per-off grid-width-100 mt-1 mr-1"
                                                         style="padding-bottom: 3px">
                                                        <div class="grid-flex grid-flex-2 grid-width-100 pl-1">
                                                            <div class="grid-flex grid-col grid-align-center grid-justify-center">
                                                                <div class="header-text-peroff grid-flex">
                                                                    20% OFF
                                                                </div>
                                                                <div class="text-under-header-peroff grid-flex">
                                                                    On your first booking
                                                                </div>
                                                                <div class="grid-flex">
                                                                    <div class="code-peroff">
                                                                        NEWBIE20
                                                                    </div>
                                                                </div>
                                                                <div class="text-peroff grid-flex grid-justify-center"
                                                                     style="margin-left: -3px">
                                                                    COPY CODE
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="grid-flex grid-flex-3 grid-width-100">
                                                            <img src="../image/per-off.png" alt="Graph"
                                                                 style="width: 100%;height: 100%">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="grid-flex grid-flex-3 mr-1">
                                            <div class="img-building grid-width-100 grid-height-100">
                                                <div class="circle-arrow grid-flex grid-align-center grid-justify-center">
                                                    <i class="fa fa-arrow-up" aria-hidden="true"
                                                       style="color:#c5d7dc;transform: rotate(41deg);"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-flex grid-flex-2">
                                            <div class="grid-flex grid-col grid-width-100">
                                                <div class="total-balance grid-flex">
                                                    <div class="grid-flex grid-col">
                                                        <div class="text-earning grid-flex" style="position: relative">
                                                            Today's Earning
                                                            <div class="div-icon-arrow-up">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                            </div>
                                                        </div>

                                                        <div class="grid-flex" style="margin-top: -2px">
                                                            $2890
                                                        </div>
                                                        <div class="field-border-dashed grid-flex">
                                                            <div class="field-fly grid-flex">
                                                                <div class="grid-flex grid-col">
                                                                    <div class="text-today-bookings grid-flex">
                                                                        Today's Bookings
                                                                    </div>
                                                                    <div class="icon-circle grid-flex grid-align-center grid-justify-center">
                                                                        <div class="icon-in-circle">

                                                                        </div>
                                                                    </div>
                                                                    <div class="number-today-bookings grid-flex">
                                                                        24
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-earning grid-flex mt-1" style="z-index: 1">
                                                            Total Balance
                                                        </div>
                                                        <div class="grid-flex" style="position:relative;margin-top: -2px">
                                                            $2M
                                                            <div class="div-icon-arrow-down">
                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="design-meeting grid-flex grid-col mt-1">
                                                    <div class="text-header-design grid-flex">
                                                        Design Meetings
                                                    </div>
                                                    <div class="text-design grid-flex">
                                                        11 Min Left
                                                    </div>
                                                    <div class="object-white grid-flex">
                                                    </div>
                                                    <div class="grid-flex" style="padding-top: 4px;">
                                                        <div class="grid-flex grid-flex-1 grid-width-100 grid-justify-start">
                                                            <div class="circle circle-user-1 grid-flex grid-justify-center grid-align-center">
                                                                <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="circle circle-number grid-flex grid-justify-center grid-align-center">
                                                                08
                                                            </div>
                                                        </div>
                                                        <div class="grid-flex grid-flex-1 grid-width-100 grid-justify-end">
                                                            <div class="circle circle-arrow-design grid-flex grid-justify-center grid-align-center"
                                                                 style="background: #fdbc0c">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"
                                                                   style="transform: rotate(41deg);color: white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid-flex grid-width-100 grid-align-center pt-1 pb-1 pr-2">

                                        <div class="active-bookings grid-flex grid-flex-1 grid-justify-start">
                                            Active Bookings
                                        </div>
                                        <div class="check-all grid-flex grid-flex-1 grid-justify-end">
                                            Check All >
                                        </div>
                                    </div>
                                    <div class="grid-flex grid-width-100 pr-2">
                                        <div class="grid-flex grid-flex-1 grid-justify-start">
                                            <div class="grid-flex grid-flex-1 grid-width-100">
                                                <div class="award-ceremony grid-flex grid-col grid-width-97">
                                                    <div class="grid-flex grid-align-center" style="padding: 3px 0">
                                                        <div class="grid-flex grid-flex-3 grid-justify-start">
                                                            <div class="text-header-award">
                                                                Award Ceremony
                                                            </div>
                                                        </div>
                                                        <div class="grid-flex grid-flex-1 grid-justify-end">
                                                            <div class="fake-checkbox grid-flex grid-justify-end">
                                                                <div class="in-fake-checkbox">

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="text-time" style="padding: 3px 0">
                                                        12:30 - 15:45
                                                    </div>
                                                    <div class="grid-flex" style="padding: 3px 0">
                                                        <div class="style-button button-team grid-flex grid-justify-center grid-align-center">
                                                            Team
                                                        </div>
                                                        <div class="style-button button-meeting grid-flex grid-justify-center grid-align-center">
                                                            Meeting
                                                        </div>
                                                    </div>
                                                    <div class="grid-flex" style="padding-top: 4px;">
                                                        <div class="grid-flex grid-flex-1 grid-width-100 grid-justify-start">
                                                            <div class="circle circle-user-booking grid-flex grid-justify-center grid-align-center">
                                                                <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="circle circle-user-booking grid-flex grid-justify-center grid-align-center">
                                                                <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="circle circle-number-bookings grid-flex grid-justify-center grid-align-center">
                                                                + 9
                                                            </div>
                                                        </div>
                                                        <div class="grid-flex grid-flex-1 grid-width-100 grid-justify-end grid-align-center">
                                                            <div class="circle-edit-design grid-flex grid-justify-center grid-align-center">
                                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="circle-arrow-design grid-flex grid-justify-center grid-align-center">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"
                                                                   style="transform: rotate(41deg);color: white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="grid-flex grid-flex-1 grid-justify-end grid-width-100">
                                            <div class="design-discussion grid-flex grid-col grid-width-97">
                                                <div class="grid-flex grid-align-center" style="padding: 3px 0">
                                                    <div class="grid-flex grid-flex-3 grid-justify-start">
                                                        <div class="text-header-award">
                                                            Design Discussion
                                                        </div>
                                                    </div>
                                                    <div class="grid-flex grid-flex-1 grid-justify-end">
                                                        <div class="fake-checkbox grid-flex grid-justify-end">
                                                            <div class="in-fake-checkbox">

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="text-time" style="padding: 3px 0">
                                                    16:30 - 20:00
                                                </div>
                                                <div class="grid-flex" style="padding: 3px 0">
                                                    <div class="style-button button-team grid-flex grid-justify-center grid-align-center">
                                                        Team
                                                    </div>
                                                    <div class="style-button button-meeting grid-flex grid-justify-center grid-align-center">
                                                        Meeting
                                                    </div>
                                                </div>
                                                <div class="grid-flex" style="padding-top: 4px;">
                                                    <div class="grid-flex grid-flex-1 grid-width-100 grid-justify-start">
                                                        <div class="circle circle-user-booking grid-flex grid-align-center grid-justify-center">
                                                            <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="circle circle-user-booking grid-flex grid-align-center grid-justify-center">
                                                            <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="circle circle-number-bookings grid-flex grid-justify-center grid-align-center">
                                                            + 2
                                                        </div>
                                                    </div>
                                                    <div class="grid-flex grid-flex-1 grid-width-100 grid-justify-end">
                                                        <div class="circle-edit-design grid-flex grid-justify-center grid-align-center">
                                                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="circle-arrow-design grid-flex grid-justify-center grid-align-center">
                                                            <i class="fa fa-arrow-up" aria-hidden="true"
                                                               style="transform: rotate(41deg);color: white"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
<!--                                </div>-->

                                <!-- end small menu overview 1 -->


                                <!-- end small menu overview 1 -->

<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <!--            menu 1 -->
                    <div class="switch-tab-content grid-flex grid-col">

                        <div class="grid-flex grid-width-100 grid-align-center pt-3 pr-2">

                            <div class="main-dashboard grid-flex grid-flex-1 grid-justify-start">
                                Cats Sales
                            </div>
                            <div class="grid-flex grid-flex-1 grid-align-center grid-justify-end">
                                <div class="manage-dropdown grid-flex pr-0">
                                    Manage&nbsp;
                                    <i class="fa fa-chevron-down" aria-hidden="true" style="color: #459089;"></i>
                                    <div class="select-menu grid-flex grid-col">
                                        <div class="in-select-menu grid-flex grid-justify-between">Add <i class="fas fa-plus"></i></div>
                                        <div class="in-select-menu grid-flex grid-justify-between">Edit <i class="fas fa-pencil-alt"></i></div>
                                        <div class="in-select-menu grid-flex grid-justify-between">Delete <i class="fas fa-trash-alt"></i></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="grid-flex grid-width-100 grid-align-center pt-1 pr-2">
                            <div class="grid-flex grid-align-center grid-justify-start grid-height-100">
                                <div class="grid-flex grid-justify-center menu-dashboard-report menu-dashboard-report-first menu-active" data-index-small-menu-report ="0">
                                    Daily
                                </div>
                                <div class="grid-flex grid-justify-center menu-dashboard-report" data-index-small-menu-report ="1">
                                    Monthly
                                </div>
                                <div class="grid-flex grid-justify-center menu-dashboard-report" data-index-small-menu-report ="2">
                                    Yearly
                                </div>
                                <div class="grid-flex grid-justify-center menu-dashboard-report" data-index-small-menu-report ="3">
                                    Totally
                                </div>
                            </div>
                        </div>
<!--                        tab small menu-->
                        <div class="switch-tab-x-small grid-height-100">
                            <div class="switch-tab-view-small">
                                <!--            small menu 1 -->
                                <div class="switch-tab-content-small grid-flex grid-col">

                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex-2 mr-2">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1 pr-2 pl-2" style="position: relative"> <!--                 1 -->
                                                        <div class="header-color-div">
                                                            Today's earning
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                            echo "฿ ".number_format($today_earning,2)-->
                                                            <div class="icon-hold-usd">
                                                                <!--                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>-->
                                                                <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="graph-earning grid-flex-1 p-1 pr-2 pl-2" style="position: relative">
                                                        <div class="header-color-div">
                                                            Benefit
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                             "฿ ".number_format(($today_earning * 30)/100,2)." (30%)" -->
                                                            <div class="div-icon-arrow-up-report">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                            </div>
<!--                                                            <div class="icon-benefit">-->
<!---->
<!--                                                                <i class="fas fa-chart-line"></i>-->
<!--                                                            </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="line-chart-today" class="bg-charts grid-flex-1" width="100%" height="78%"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="grid-flex-1">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Cat sold
                                                        </div>
                                                        <div class="text-money">
<!--                                                             echo $cat_sold_day-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="doughnut-chart-today" class="bg-charts" width="100%" height="157"></canvas>
                                                    <div class="test-text" style="position: absolute;right: 10px;left: 10px">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--            small menu 2 -->
                                <div class="switch-tab-content-small grid-flex grid-col">

                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex-2 mr-2">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1 pr-2 pl-2" style="position: relative"> <!--                 1 -->
                                                        <div class="header-color-div">
                                                            Today's earning
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                            echo "฿ ".number_format($month_earning,2)-->
                                                            <div class="icon-hold-usd">
                                                                <!--                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>-->
                                                                <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="graph-earning grid-flex-1 p-1 pr-2 pl-2" style="position: relative">
                                                        <div class="header-color-div">
                                                            Benefit
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                            echo "฿ ".number_format(($month_earning * 30)/100,2)." (30%)" -->
                                                            <div class="div-icon-arrow-up-report">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                            </div>
                                                            <!--                                                            <div class="icon-benefit">-->
                                                            <!--                                                                <i class="fas fa-chart-line"></i>-->
                                                            <!--                                                            </div>-->
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="line-chart-daily" class="bg-charts grid-flex-1" width="100%" height="78%"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="grid-flex-1">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Cat sold
                                                        </div>
                                                        <div class="text-money">
<!--                                                             echo $cat_sold_month-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="doughnut-chart-daily" class="bg-charts" width="100%" height="157"></canvas>
                                                    <div class="test-text" style="position: absolute;right: 10px;left: 10px">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--            small menu 3 -->
                                <div class="switch-tab-content-small grid-flex grid-col">

                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex-2 mr-2">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1 pr-2 pl-2" style="position: relative"> <!--                 1 -->
                                                        <div class="header-color-div">
                                                            Today's earning
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                             echo "฿ ".number_format($year_earning,2)-->
                                                            <div class="icon-hold-usd">
                                                                <!--                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>-->
                                                                <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="graph-earning grid-flex-1 p-1 pr-2 pl-2" style="position: relative">
                                                        <div class="header-color-div">
                                                            Benefit
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                             echo "฿ ".number_format(($year_earning * 30)/100,2)." (30%)" -->
                                                            <div class="div-icon-arrow-up-report">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                            </div>
                                                            <!--                                                            <div class="icon-benefit">-->
                                                            <!--                                                                <i class="fas fa-chart-line"></i>-->
                                                            <!--                                                            </div>-->
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="line-chart-monthly" class="bg-charts grid-flex-1" width="100%" height="78%"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="grid-flex-1">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Cat sold
                                                        </div>
                                                        <div class="text-money">
<!--                                                             echo $cat_sold_year-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="doughnut-chart-monthly" class="bg-charts" width="100%" height="157"></canvas>
                                                    <div class="test-text" style="position: absolute;right: 10px;left: 10px">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--            small menu 4 -->
                                <div class="switch-tab-content-small grid-flex grid-col">

                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex-2 mr-2">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1 pr-2 pl-2" style="position: relative"> <!--                 1 -->
                                                        <div class="header-color-div">
                                                            Today's earning
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                             echo "฿ ".number_format($total_earning,2)-->
                                                            <div class="icon-hold-usd">
                                                                <!--                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>-->
                                                                <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="graph-earning grid-flex-1 p-1 pr-2 pl-2" style="position: relative">
                                                        <div class="header-color-div">
                                                            Benefit
                                                        </div>
                                                        <div class="text-money grid-flex grid-justify-between">
<!--                                                             echo "฿ ".number_format(($total_earning * 30)/100,2)." (30%)" -->
                                                            <div class="div-icon-arrow-up-report">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                            </div>
                                                            <!--                                                            <div class="icon-benefit">-->
                                                            <!--                                                                <i class="fas fa-chart-line"></i>-->
                                                            <!--                                                            </div>-->
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="line-chart-yearly" class="bg-charts grid-flex-1" width="100%" height="78%"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="grid-flex-1">
                                            <div class="grid-flex grid-col">
                                                <div class="grid-flex">
                                                    <div class="graph-earning grid-flex-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Cat sold
                                                        </div>
                                                        <div class="text-money">
<!--                                                             echo $cat_sold_total-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1" style="position: relative">
                                                    <canvas id="doughnut-chart-yearly" class="bg-charts" width="100%" height="157"></canvas>
<!--                                                    <div class="test-text" style="position: absolute;right: 10px;left: 10px">-->
<!--                                                        aa-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                                    menu-->
                    </div>
                    <!--                        end content 2-->
                </div>
            </div>

        </div>
        <div class="area-2 grid-flex grid-col grid-flex-1 pl-1 pt-2 pr-2 pb-2 ">
            <div class="header-area-2 grid-flex mr-2">
                <div class="grid-flex grid-flex-1 pt-1">
                    <div class="header-icon-mail grid-flex grid-justify-center grid-align-center ml-2">
                        <i class="far fa-envelope" aria-hidden="true" style="font-size: 18px"></i>
                        <div class="mail grid-flex grid-col">
                            No detail
                        </div>
                        <div class="point-on-icon-letter">
                        </div>

                    </div>
                    <div class="header-icon-notification grid-flex grid-justify-center grid-align-center">
                        <i class="far fa-bell" aria-hidden="true" style="font-size: 18px"></i>
                        <div class="notification grid-flex grid-col">
                            No detail
                        </div>
                        <div class="point-on-icon-bell">
                        </div>
                    </div>
                </div>
                <div class="grid-flex grid-flex-2 grid-justify-end grid-align-center">
                    <div class="data-user mr-1">
                        <div class="grid-flex grid-col grid-align-end">
                            <div class="name-user grid-flex">
                                Passakorn P.
                            </div>
                            <div class="type-user grid-flex">
                                Super Admin
                            </div>
                        </div>

                    </div>
                    <div class="img-profile grid-flex grid-align-center grid-justify-center">
                        <i class="fas fa-user fa-3x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <!--                calenadr-->
            <div class="calendar-x grid-flex grid-col grid-flex-1">
                <div class="main-header mt-3 grid-flex grid-justify-between mr-2 ml-2 grid-align-end">
                    <div class="header-text grid-flex grid-flex-1">
                        <div class="calendar-x-date"></div>
                        <div class="calendar-x-day"></div>
                    </div>
                    <div class="grid-flex">
                        <div class="calendar-x-btn previous-btn"><i class="fas fa-chevron-left"></i></div>
                        <div class="calendar-x-btn next-btn"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="calendar-x-content grid-flex grid-col"></div>
                <div class="calendar-x-period grid-flex grid-col grid-flex-1 pt-1 pb-1 ml-2"></div>
            </div>

            <!--                calenadr-->
        </div>
    </div>

</div>
<?php JSRegister::begin() ?>
<script>
    $(document).delegate('.manage-dropdown', 'click', function () {
        $(this).toggleClass('show-dropdown');
    });
    $(document).delegate('.fake-checkbox', 'click', function () {
        $(this).toggleClass('open-checkpoint');
    });
    $(document).delegate('.header-icon-mail', 'click', function () {
        $(this).toggleClass('show-mail');
    });
    $(document).delegate('.header-icon-notification', 'click', function () {
        $(this).toggleClass('show-notification');
    });

    //calendar
    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const dayNames = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    const dayNameShort = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    const mainTime = ["8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30"];
    var dateMain = new Date()
    var dateNowMain = dateMain.getDate()
    const renderCalendarX = function (date = new Date()) {
        let dateCarX = date

        $('.calendar-x-date').html(`${dateCarX.getFullYear()} ${monthNames[dateCarX.getMonth()]}, ${dateCarX.getDate()}`)
        $('.calendar-x-day').html(`${dayNames[dateCarX.getDay() - 1]}`)

        let _this = $('.calendar-x-content')
        _this.empty()

        let dayRow = $('<div/>').attr({
            "class": "header-calendar-x-row grid-flex grid-justify-center grid-align-center grid-width-100 pt-1"
        })

        dayNameShort.forEach(function (item, key) {
            dayRow.append(`<div class="header-calendar-x grid-flex grid-align-center grid-justify-center">${item}</div>`)
        })

        _this.append(dayRow)


        let dateRow = $('<div/>').attr({
            "class": "header-calendar-x-date grid-flex grid-align-center grid-width-100 grid-wrap"
        })
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0)
        let startDate = firstDay.getDay()
        var lastDayAgo = parseInt(new Date(date.getFullYear(), date.getMonth(), 0).getDate())
        if (startDate > 1) {
            for (let j = startDate - 1; j >= 0; j--) {
                dateRow.append(`<div class="body-calendar-date grid-flex grid-align-center grid-justify-center"><div class="date-x-last">${lastDayAgo - j}</div></div>`)
            }
        }

        for (let i = 1; i <= lastDay.getDate(); i++) {
            if (new Date().setHours(0, 0, 0, 0) == new Date(dateMain.getFullYear(), dateMain.getMonth(), i).setHours(0, 0, 0, 0)) {
                dateRow.append(`<div class="body-calendar-date grid-flex grid-align-center grid-justify-center"><div class="now-date">${i}</div></div>`)
            } else if (i == dateNowMain) {
                dateRow.append(`<div class="body-calendar-date grid-flex grid-align-center grid-justify-center"><div class="date-now-x">${i}</div></div>`)
            } else {
                dateRow.append(`<div class="body-calendar-date grid-flex grid-align-center grid-justify-center"><div class="date-x">${i}</div></div>`)
            }
        }

        if (lastDay.getDay() < 6) {
            let nextDate = 7 - lastDay.getDay()
            for (let k = 1; k < nextDate; k++) {
                dateRow.append(`<div class="body-calendar-date grid-flex grid-align-center grid-justify-center"><div class="date-x-last">${k}</div></div>`)
            }
        }

        _this.append(dateRow)
        let _thisX = $('.calendar-x-period')
        _thisX.empty()
        mainTime.forEach(function (item, key) {
            _thisX.append(`<div class="body-period grid-flex grid-align-end grid-flex-1"><div class="period-time">${item}</div><div class="period-activity ml-2 bb-1"></div></div>`)
        })

    }

    /* switch tab*/
    $(document).ready(function () {
        let dateCarX = new Date()

        renderCalendarX(dateCarX)
    })

    $(document).delegate('.previous-btn', 'click', function () {
        dateMain = new Date(dateMain.getFullYear(), dateMain.getMonth() - 1, dateNowMain)
        renderCalendarX(dateMain)
    })
    $(document).delegate('.next-btn', 'click', function () {
        dateMain = new Date(dateMain.getFullYear(), dateMain.getMonth() + 1, dateNowMain)
        renderCalendarX(dateMain)
    })

    //slide header menu
    const tabSwicth = function (index = '0') {
        // header menu
        let widthtabX = $('.switch-tab-x').innerWidth()
        let heightabview= $('.switch-tab-view').innerHeight()
        $('.switch-tab-x').css('height', heightabview + 'px')
        $('.switch-tab-content').css('width', widthtabX + 'px')

    }

    const handleOnSwicthTab = function (index = '0') {
        let widthtabX = $('.switch-tab-x').innerWidth()
        $('.switch-tab-view').css('left', '-' + (index * widthtabX) + 'px')

    }
    //small menu
    const tabSwicthSmallMenu = function (index = '0') {
        let widthtabSmallX = $('.switch-tab-x-small').innerWidth()
        let heightabSmallview= $('.switch-tab-view-small').innerHeight()

        // close becuase add grid-width-100 in switch-tab-x-small
        // $('.switch-tab-x-small').css('height', heightabSmallview + 'px')
        $('.switch-tab-content-small').css('width', widthtabSmallX + 'px')
    }

    const handleOnSwicthTabSmallMenu = function (index = '0') {
        let widthtabSmallX = $('.switch-tab-x-small').innerWidth()
        $('.switch-tab-view-small').css('left', '-' + (index * widthtabSmallX) + 'px')

    }
    // small menu overview

    const tabSwicthSmallMenuOverview = function () {
        let widthtabSmallXOverview = $('.switch-tab-content').innerWidth()
        let heightabSmallViewOverview = $('.switch-tab-view-small-overview').innerHeight()
        console.log(widthtabSmallXOverview)
        $('.switch-tab-x-small-overview').css('height', heightabSmallViewOverview + 'px')
        // close becuase add grid-width-100 in switch-tab-x-small-overview +++++++++
        $('.switch-tab-content-small-overview').css('width', widthtabSmallXOverview + 'px')
        // console.log($('.switch-tab-content-small-overview').innerWidth())

    }

    const handleOnSwicthTabSmallMenuOverview = function (index = '0') {
        let widthtabSmallXOverview = $('.switch-tab-x-small-overview').innerWidth()
        $('.switch-tab-view-small-overview').css('left', '-' + (index * widthtabSmallXOverview ) + 'px')
    }

    $(document).ready(function () {
        // console.log('ready')
        tabSwicth()
        tabSwicthSmallMenuOverview()
        tabSwicthSmallMenu()

    })
    // menu active header
    $(document).delegate('.menu-item', 'click', function () {
        let data_index = $(this).attr('data-index');
        //set first menu-active small menu when change menu header
        if (data_index === '0'){
            $('.menu-dashboard-report').removeClass('menu-active');
            $('.menu-dashboard-report-first').addClass('menu-active')
            $('.switch-tab-view-small').css('left', '0' + 'px')
        }
        else if(data_index === '1'){
            $('.menu-dashboard-overview').removeClass('menu-active');
            $('.menu-dashboard-overview-first').addClass('menu-active')
        }

        $('.menu-item').removeClass('menu-active');
        $(this).addClass('menu-active');
        handleOnSwicthTab(data_index);
    })
    //menu active dashboard overview
    $(document).delegate('.menu-dashboard-overview', 'click', function () {
        let data_index_small_menu_overview = $(this).attr('data-index-small-menu-overview');
        $('.menu-dashboard-overview').removeClass('menu-active');
        $(this).addClass('menu-active');
        handleOnSwicthTabSmallMenuOverview(data_index_small_menu_overview);
    })
    //menu active dashboard report
    $(document).delegate('.menu-dashboard-report', 'click', function () {
        let data_index_small_menu_report = $(this).attr('data-index-small-menu-report');
        $('.menu-dashboard-report').removeClass('menu-active');
        $(this).addClass('menu-active');
        handleOnSwicthTabSmallMenu(data_index_small_menu_report);
    })
    //today
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

    // DataGraph
    var dataOrder = '<?= $dataOrder ?>'

    const dataForYear = function(data) {
        let returnLabelYear = []
        let returnDataOrderYear = []
        let returnDataCatYear = []

        if (data) {
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
        }
        return {label_year: returnLabelYear, Order_year: returnDataOrderYear , Cat_year: returnDataCatYear}
    }

    const dataForMonth = function(data) {
        let returnLabelMonth = []
        let returnDataOrderMonth = []
        let returnDataCatMonth = []
        if (data) {
            Object.keys(data).forEach(function (item, key) {
                Object.keys(data[item]).forEach(function (itemMonth, key) {
                    returnLabelMonth.push(itemMonth) // label year
                    let cat_amount_Month = 0
                    let order_amount_Month = 0
                    Object.keys(data[item][itemMonth]).forEach(function (itemDay, key) {
                        cat_amount_Month += parseInt(data[item][itemMonth][itemDay].amount_cat)
                        order_amount_Month += parseInt(data[item][itemMonth][itemDay].amount_order)
                    })
                    returnDataOrderMonth.push(order_amount_Month)
                    returnDataCatMonth.push(cat_amount_Month)
                })

            })
        }
        return {label_month: returnLabelMonth, Order_month: returnDataOrderMonth , Cat_month: returnDataCatMonth}
    }

    const dataForDay = function(data) {
        let returnDataLabelDay = []
        let returnDataOrderDay = []
        let returnDataCatDay = []

            Object.keys(data[yyyy][mm]).forEach(function (itemDay, key) {
                let cat_amount_Day = 0
                let order_amount_Day = 0

                returnDataLabelDay.push(data[yyyy][mm][itemDay].text_date) // label day
                console.log(returnDataLabelDay)
                returnDataOrderDay.push(parseInt(data[yyyy][mm][itemDay].amount_order))
                returnDataCatDay.push(parseInt(data[yyyy][mm][itemDay].amount_order))
            })

        return {label_day: returnDataLabelDay, Order_day: returnDataOrderDay , Cat_day:returnDataCatDay}
    }
    const dataForToday = function(data) {
        let returnDataLabelToday = []
        let returnDataOrderToday = []
        let returnDataCatToday = []
        returnDataLabelToday.push(today) // label today
        return {label_today: returnDataLabelToday, Order_today: returnDataOrderToday , Cat_today: returnDataCatToday}
    }

    let dataJson = JSON.parse(dataOrder)
    var dataYear = dataForYear(dataJson);
    var dataMonth = dataForMonth(dataJson);
    var dataDay = dataForDay(dataJson);
    var dataToday = dataForToday(dataJson);
    console.log(dataDay.Cat_day)

        //color chart LinearGradient
    var ctx1 = document.getElementById("line-chart-today").getContext("2d");

    var gradientFillCat = ctx1.createLinearGradient(0, 0, 0, 300);
    gradientFillCat.addColorStop(0, "rgba(255,166,43,0.98)");
    gradientFillCat.addColorStop(1, "rgba(255, 255, 255, 0)");

    var gradientFillOrder = ctx1.createLinearGradient(0, 0, 0, 300);
    gradientFillOrder.addColorStop(0, "#16697afa");
    gradientFillOrder.addColorStop(1, "rgba(255, 255, 255, 0)");

    // chart daily main graph
    new Chart(document.getElementById("line-chart-today"), {
        type: 'bar',
        data: {
            labels:
            dataToday.label_today
            ,
            datasets: [{
                label: "Order",
                data: [0],
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
                    data:[0] ,
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
            //maintainAspectRatio: false,
            // layout: {
            //     padding: {
            //         left: 50,
            //     }
            // },
            title: {
                display: true,
                text: 'Daily summarize sale'
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
                    scaleLabel : {
                        display : true,
                        labelString : "Number of cats (ตัว)",
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
                    scaleLabel : {
                        display : true,
                        labelString : "To Day",
                    },
                }]
            },
            responsive:true,
        }
    });

    // doughnut chart today
    new Chart(document.getElementById("doughnut-chart-today"), {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#05668d",
                        "#00a896",
                        "#02c39a",
                        "#f0f3bd",
                        "#cad2c5",],
                    data:  [0]// echo $count_type_cat_day ?>
                }
            ],
            labels: ["0"]// echo $type_cat_day ?>
             ,
        },
        options: {
            elements: {
                center: {

                    text: '90%',
                    color: '#FF6384', // Default is #000000
                    fontStyle: 'Arial', // Default is Arial
                    sidePadding: 20 // Defualt is 20 (as a percentage)
                }
            },
            title: {
                display: true,
                text: 'Breed of cats'
            },
            legend: {
                display: true,
                position: 'bottom',
            },
        }
    });
    //chart daily
    new Chart(document.getElementById("line-chart-daily"), {
        type: 'line',
        data: {
            labels:
            // [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
            // echo $graphday; ?>
                dataDay.label_day
            ,
            datasets: [{
                label: "Order", // text legend
                data:
                    // [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
                // echo $amount_order_day?>
                dataDay.Order_day
                ,
                borderWidth: 3,
                borderColor: "#16697a",
                fill: true,
                backgroundColor: gradientFillOrder,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                spanGaps: true,
                // lineTension: 0,// line dont curve
            }, {
                // label: "Sell Cat/Day",
                label: "Cat Sold", // text legend
                data:
                // echo $amount_orderdt_day?>
                dataDay.Cat_day
                ,
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
                text: 'Daily summarize sale'
            },
            legend: {
                display: true,
                legendText : ['Current','Vs last week/month/year']

            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawOnChartArea: false
                    },
                    scaleLabel : {
                        display : true,
                        labelString : "Number of cats (ตัว)",
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
                    scaleLabel : {
                        display : true,
                        labelString : "Days",
                    },
                }]
            },
            responsive:true,
        }
    });
    // doughnut chart daily
    new Chart(document.getElementById("doughnut-chart-daily"), {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#05668d",
                        "#00a896",
                        "#02c39a",
                        "#f0f3bd",
                        "#ffc16c",],
                    data: [0]// echo $count_type_cat_month?>
                }
            ],
            labels: ["0"]// echo $type_cat_month?>
             ,
        },
        options: {
            title: {
                display: true,
                text: 'Breed of cats'
            },
            legend: {
                display: true,
                position: 'bottom',
            },
        }
    });
    // chart monthly
    new Chart(document.getElementById("line-chart-monthly"), {
        type: 'line',
        data: {
            labels:
            // echo $graphmonth; ?>
                dataMonth.label_month
            ,
            datasets: [{
                label: "Order", // text legend
                data:
                // echo $amount_order_month?>
                    dataMonth.Order_month
                ,
                borderWidth: 3,
                borderColor: "#16697a",
                fill: true,
                backgroundColor: gradientFillOrder,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                lineTension: 0.3,
                spanGaps: true,
            }, {
                label: "Cat Sold",
                data:
                // echo $amount_orderdt_month?>
                    dataMonth.Cat_month
                ,
                borderWidth: 3,
                borderColor: "#ffa62b",
                fill: true,
                backgroundColor: gradientFillCat,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                // lineTension: 0,// line dont curve
                spanGaps: false,
            }


            ]
        },
        options: {
            title: {
                display: true,
                text: 'Daily summarize sale'
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
                    scaleLabel : {
                        display : true,
                        labelString : "Number of cats (ตัว)",
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
                    scaleLabel : {
                        display : true,
                        labelString : "Months",
                    },
                }]
            },
            responsive:true,
        }
    });

    // doughnut chart monthly
    new Chart(document.getElementById("doughnut-chart-monthly"), {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#FF6384",
                        "#36A2EB",
                        "#c456ff",
                        "#e5d358",
                        "#8ae755",
                        "#e253ba"],
                    data: [0]// echo $count_type_cat_year?>
                }
            ],
            labels: ["0"]// echo $type_cat_year?
             ,
        },
        options: {
            elements: {
                center: {

                    text: '90%',
                    color: '#FF6384', // Default is #000000
                    fontStyle: 'Arial', // Default is Arial
                    sidePadding: 20 // Defualt is 20 (as a percentage)
                }
            },
            title: {
                display: true,
                text: 'Breed of cats'
            },
            legend: {
                display: true,
                position: 'bottom',
            },
        }
    });
    // chart yearly
    new Chart(document.getElementById("line-chart-yearly"), {
        type: 'bar',
        data: {
            labels:
                dataYear.label_year// echo $graphyear; ?>
            ,
            datasets: [{
                label: "Order", // text legend
                data:
                    dataYear.Order_year // echo $amount_order_year?>
                ,
                borderWidth: 3,
                borderColor: "#16697a",
                fill: true,
                backgroundColor: gradientFillOrder,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                spanGaps: true,
            }, {
                label: "Cat Sold",
                data:
                    dataYear.Cat_year // echo $amount_orderdt_year?>
                ,
                borderWidth: 3,
                borderColor: "#ffa62b",
                fill: true,
                backgroundColor: gradientFillCat,
                pointBorderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointRadius: 2,
                pointHoverRadius: 5,
                // lineTension: 0,// line dont curve
                spanGaps: false,
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Daily summarize sale'
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
                    scaleLabel : {
                        display : true,
                        labelString : "Number of cats (ตัว)",
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
                    scaleLabel : {
                        display : true,
                        labelString : "Years",
                    },
                }]
            },
            responsive:true,
        }
    });

    // doughnut chart yearly
    new Chart(document.getElementById("doughnut-chart-yearly"), {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#FF6384",
                        "#36A2EB",
                        "#c456ff",
                        "#e5d358",
                        "#8ae755",
                        "#e253ba"],
                    data: [0]// echo $count_type_cat_total?>
                }
            ],
            labels: ["0"]// echo $type_cat_total?>
             ,
        },
        options: {
            elements: {
                center: {

                    text: '90%',
                    color: '#FF6384', // Default is #000000
                    fontStyle: 'Arial', // Default is Arial
                    sidePadding: 20 // Defualt is 20 (as a percentage)
                }
            },
            title: {
                display: true,
                text: 'Breed of cats'
            },
            legend: {
                display: true,
                position: 'bottom',
            },
        }
    });


</script>
<?php JSRegister::end() ?>
