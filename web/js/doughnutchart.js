// doughnut chart today
// จำเป็นต้องใช้ doc.ready ไม่งั้นไม่ได้
$(document).ready(function () {
        //the event occurred
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
                    data: dataTypeCatToday.count_type_cat_Today// echo $count_type_cat_day ?>
                }
            ],
            labels: dataTypeCatToday.label_type_Today// echo $type_cat_day ?>
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
                    data: dataTypeCatDaily.count_type_cat_Daily// echo $count_type_cat_month?>
                }
            ],
            labels: dataTypeCatDaily.label_type_Daily// echo $type_cat_month?>
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
                    data: dataTypeCatMonthly.count_type_cat_month// echo $count_type_cat_year?>
                }
            ],
            labels: dataTypeCatMonthly.label_type_month// echo $type_cat_year?
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
                    data: dataTypeCatYearly.count_type_cat_year// echo $count_type_cat_total?>
                }
            ],
            labels: dataTypeCatYearly.label_type_year// echo $type_cat_total?>
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
})