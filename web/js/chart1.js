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

//color chart LinearGradient
var ctx1 = document.getElementById("line-chart-daily").getContext("2d");

var gradientFillCat = ctx1.createLinearGradient(0, 0, 0, 300);
gradientFillCat.addColorStop(0, "rgba(255,166,43,0.98)");
gradientFillCat.addColorStop(1, "rgba(255, 255, 255, 0)");

var gradientFillOrder = ctx1.createLinearGradient(0, 0, 0, 300);
gradientFillOrder.addColorStop(0, "#16697afa");
gradientFillOrder.addColorStop(1, "rgba(255, 255, 255, 0)");

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

// chart daily main graph
new Chart(document.getElementById("line-chart-daily"), {
    type: 'bar',
    data: {
        labels:
            [today]
        ,
        datasets: [{
            label: "Order",
            data:
        <?php echo $amount_order_today?>
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
        lineTension: 0.3,
    }, {
    label: "Cat Sold",
        data:
<?php echo $amount_orderdt_today?>
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
                    "#cad2c5",],
                data:  <?php echo $count_type_cat_day ?>
    }
],
labels: <?php echo $type_cat_day ?>,
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
    // [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
    <?php echo $graphday; ?>
    ,
    datasets: [{
    label: "Order", // text legend
    data:
// [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
<?php echo $amount_order_day?>
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
<?php echo $amount_orderdt_day?>
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
// doughnut chart monthly
new Chart(document.getElementById("doughnut-chart-monthly"), {
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
                data: <?php echo $count_type_cat_month?>
    }
],
labels: <?php echo $type_cat_month?>,
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
// chart yearly
new Chart(document.getElementById("line-chart-yearly"), {
    type: 'line',
    data: {
        labels:
    <?php echo $graphmonth; ?>
    ,
    datasets: [{
    label: "Order", // text legend
    data:
<?php echo $amount_order_month?>
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
<?php echo $amount_orderdt_month?>
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
                data: <?php echo $count_type_cat_year?>
    }
],
labels: <?php echo $type_cat_year?>,
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
// chart total
new Chart(document.getElementById("line-chart-totally"), {
    type: 'bar',
    data: {
        labels:
    <?php echo $graphyear; ?>
    ,
    datasets: [{
    label: "Order", // text legend
    data:
<?php echo $amount_order_year?>
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
<?php echo $amount_orderdt_year?>
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

// doughnut chart totally
new Chart(document.getElementById("doughnut-chart-totally"), {
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
                data: <?php echo $count_type_cat_total?>
    }
],
labels: <?php echo $type_cat_total?>,
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