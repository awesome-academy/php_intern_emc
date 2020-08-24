$(document).ready(function() {
    var dataStatistical = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // dữ liệu ban đầu của 12 tháng
    $.ajax({
        type: 'GET',
        url: 'admin/statistical',
        success: function(res) {
            // dữ liệu trả về {5: 153000, 7: 30000}
            // res là 1 đối tượng nên dùng for in để lặp và chèn vào dataStatistical ({5: 153000} tức là tháng 6 bán được 153000 đ)
            for(let item in res) {
                dataStatistical[item] = res[item];
            }

            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',

                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Revenue',
                        backgroundColor: 'rgba(255, 255, 255, 0)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: dataStatistical, // gán dữ liệu vào char
                    }]
                },

                options: {
                    animation: {
                        duration: 1000,
                        easing: 'linear'
                    },
                    scales: {
                        yAxes: [{
                            stacked: true
                        }]
                    }
                },
            });
        },
        error: function(err) {

        }
    });
});
