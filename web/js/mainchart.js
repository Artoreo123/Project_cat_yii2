// chart today main graph
$(document).ready(function () {
    new Chart(document.getElementById("line-chart-today"), {
        type: 'bar',
        data: {
            labels:
            dataToday.label_today
            ,
            datasets: [{
                label: "Order",
                data: dataToday.Order_today,
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
                data: dataToday.Cat_today,
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
                        labelString: "To Day",
                    },
                }]
            },
            responsive: true,
            tooltips: {
                mode: 'point',
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
            dataDaily.label_day
            ,
            datasets: [{
                label: "Order", // text legend
                data:
                // [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
                // echo $amount_order_day?>
                dataDaily.Order_day
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
                dataDaily.Cat_day
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
                legendText: ['Current', 'Vs last week/month/year']

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
                    ticks: {
                        autoSkip: false,
                        // maxRotation: 20,
                        minRotation: 20, // label day tilted(ตัวเอียง)
                    },
                    gridLines: {
                        drawOnChartArea: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Days",
                    },
                }]
            },
            responsive: true,
            hover: {
                mode: 'nearest',
                intersect: false,
                axis: 'x',
            },
        }
    });
    // chart monthly
    new Chart(document.getElementById("line-chart-monthly"), {
        type: 'line',
        data: {
            labels:
            // echo $graphmonth; ?>
            dataMonthly.label_month
            ,
            datasets: [{
                label: "Order", // text legend
                data:
                // echo $amount_order_month?>
                dataMonthly.Order_month
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
                dataMonthly.Cat_month
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
                        labelString: "Months",
                    },
                }]
            },
            responsive: true,
            hover: {
                mode: 'nearest',
                intersect: false,
                axis: 'x',
            },
        }
    });
    // chart yearly
    new Chart(document.getElementById("line-chart-yearly"), {
        type: 'bar',
        data: {
            labels:
            dataYearly.label_year// echo $graphyear; ?>
            ,
            datasets: [{
                label: "Order", // text legend
                data:
                dataYearly.Order_year // echo $amount_order_year?>
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
                dataYearly.Cat_year // echo $amount_orderdt_year?>
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
                        labelString: "Years",
                    },
                }]
            },
            responsive: true,
        }
    });
})