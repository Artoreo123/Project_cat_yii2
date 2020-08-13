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
                                                       style="transform: rotate(41deg);"></i>
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
                                        <div class="in-select-menu">Add <i class="fa fa-plus-square-o"
                                                                           aria-hidden="true"></i></div>
                                        <div class="in-select-menu">Edit <i class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i></div>
                                        <div class="in-select-menu">Delete <i class="fa fa-trash-o"
                                                                              aria-hidden="true"></i></div>
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
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Today's earning
                                                        </div>
                                                    </div>
                                                    <div class="graph-earning grid-flex-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Benefit
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
                                                            Balance
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="doughnut-chart-daily" class="bg-charts" width="100%" height="157"></canvas>
                                                    <div class="test-text" style="position: absolute;right: 10px;left: 10px">
                                                        asd
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
                                                    <div class="graph-earning grid-flex-1 mr-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Today's earning
                                                        </div>
                                                    </div>
                                                    <div class="graph-earning grid-flex-1 p-1 pl-2">
                                                        <div class="header-color-div">
                                                            Benefit
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
                                                            Balance
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-flex mt-1">
                                                    <canvas id="doughnut-chart-monthly" class="bg-charts" width="100%" height="157"></canvas>
                                                    <div class="test-text" style="position: absolute;right: 10px;left: 10px">
                                                        asd
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--            small menu 3 -->
                                <div class="switch-tab-content-small grid-flex grid-col">

                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex grid-col grid-width-100">
                                            <div class="grid-flex ">
                                                <div class="grid-flex-1">
                                                    <div class="graph-earning color-header-div mr-2 p-1 pl-2">
                                                        Today's earning 3
                                                    </div>
                                                </div>
                                                <div class="grid-flex-1">
                                                    <div class="graph-earning color-header-div mr-2 p-1 pl-2">
                                                        Benefit 3
                                                    </div>
                                                </div>
                                                <div class="grid-flex-1">
                                                    <div class="graph-earning color-header-div p-1 pl-2">
                                                        Balance 3
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-flex mt-1">
                                                <div class="grid-flex-1">
                                                    <canvas id="line-chart-yearly" class="bg-charts grid-flex-1" width="100%" height="65%"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--            small menu 4 -->
                                <div class="switch-tab-content-small grid-flex grid-col">

                                    <div class="grid-flex grid-width-100 pt-2 pr-2">
                                        <div class="grid-flex grid-col grid-width-100">
                                            <div class="grid-flex ">
                                                <div class="grid-flex-1">
                                                    <div class="graph-earning color-header-div mr-2 p-1 pl-2">
                                                        Today's earning 4
                                                    </div>
                                                </div>
                                                <div class="grid-flex-1">
                                                    <div class="graph-earning color-header-div mr-2 p-1 pl-2">
                                                        Benefit 4
                                                    </div>
                                                </div>
                                                <div class="grid-flex-1">
                                                    <div class="graph-earning color-header-div p-1 pl-2">
                                                        Balance 4
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-flex mt-1">
                                                <div class="grid-flex-1">
                                                    <canvas id="line-chart-total" class="bg-charts grid-flex-1" width="100%" height="65%"></canvas>
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
        //แก้บัค menu-active small menu when change menu header
        if (data_index === '0'){
            $('.menu-dashboard-report').removeClass('menu-active');
            $('.menu-dashboard-report-first').addClass('menu-active')
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
        handleOnSwicthTabSmallMenu(data_index_small_menu_report );
    })

    // chart daily main graph
    new Chart(document.getElementById("line-chart-daily"), {
        type: 'line',
        data: {
            labels:
            <?php echo $dategraph; ?>
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
                text: 'Daily summarize sale'
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{

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
                    backgroundColor: ["#FF6384",
                        "#36A2EB",
                        "#c456ff",
                        "#e5d358",
                        "#8ae755",
                        "#e253ba"],
                    data: [2,4,1,7,3,5]
                }
            ],
            labels: ["Persian","Bengal","Russian Blue", "Scottish Fold","British Shorthair", "American Shorthair",],
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
    //chart monthly
    new Chart(document.getElementById("line-chart-monthly"), {
        type: 'line',
        data: {
            labels:
            <?php echo $dategraph; ?>
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

        backgroundColor: "#000",
        options: {
            // height: "200px",

            title: {
                display: true,
                text: 'Daily summarize sale'
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{

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
                    scaleLabel : {
                        display : true,
                        labelString : "Days",
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
                    data: [2,4,1,7,3,5]
                }
            ],
            labels: ["Persian","Bengal","Russian Blue", "Scottish Fold","British Shorthair", "American Shorthair",],
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
        type: 'line',
        data: {
            labels:
            <?php echo $dategraph; ?>
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

        backgroundColor: "#000",
        options: {
            // height: "200px",

            title: {
                display: true,
                text: 'Daily summarize sale'
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{

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
                    scaleLabel : {
                        display : true,
                        labelString : "Days",
                    },
                }]
            },
            responsive:true,
        }
    });
    // chart total
    new Chart(document.getElementById("line-chart-total"), {
        type: 'line',
        data: {
            labels:
            <?php echo $dategraph; ?>
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

        backgroundColor: "#000",
        options: {
            // height: "200px",

            title: {
                display: true,
                text: 'Daily summarize sale'
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{

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
                    scaleLabel : {
                        display : true,
                        labelString : "Days",
                    },
                }]
            },
            responsive:true,
        }
    });

</script>
<?php JSRegister::end() ?>
