$(document).ready(function () {

    var dataByMonth = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var labelByMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var dataByQuater = [0, 0, 0];
    var labelByQuater = ['Quarter 1', 'Quarter 2', 'Quarter 3'];
    var dataByYear = [];
    var labelByYear = [];

    getOrder('month', labelByMonth, dataByMonth);
    $('.js-select-chart').change(function () {
        var getBy = $(this).val();
        if (getBy == 'quarter') {
            getOrder(getBy, labelByQuater, dataByQuater);
        }
        if (getBy == 'month') {
            getOrder(getBy, labelByMonth, dataByMonth);
        }
        if (getBy == 'year') {
            getOrder(getBy, labelByYear, dataByYear);
        }
    });

    function getOrder(getBy, label, data) {
        $.ajax({
            type: 'GET',
            url: 'admin/charts?getby=' + getBy,
            success: function (res) {
                if (getBy == 'year') {
                    res.forEach(function (item, key) {
                        data[key] = item.data;
                        label[key] = item.indexs;
                    });
                } else {
                    res.forEach(function (item) {
                        data[item.indexs] = item.data;
                    });
                }
                var ctx = document.getElementById('charts');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Total Order By ' + getBy,
                            data: data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
            ,
            error: function (err) {

            }
        });
    }
});
