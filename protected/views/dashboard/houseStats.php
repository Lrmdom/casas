<?php
//foreach ($model->precos as $key => $value) {
//    foreach ($value as $key => $val) {
//        echo $val . "<br>";
//    }
//}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <h5>Reservas e prereservas</h5>

            <div class="ct-chart ct-perfect-fourth" id="chart1"></div>

            <script>
                var data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                };

                var options = {
                    seriesBarDistance: 10
                };

                var responsiveOptions = [
                    ['screen and (max-width: 640px)', {
                            seriesBarDistance: 5,
                            axisX: {
                                labelInterpolationFnc: function(value) {
                                    return value[0];
                                }
                            }
                        }]
                ];

                new Chartist.Bar('#chart1', data, options, responsiveOptions);
            </script>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6">
            <h5>Valores</h5>
            <div class="ct-chart ct-perfect-fourth" id="chart2"></div>

            <script>
                var data = {
                    labels: ['Bananas', 'Apples', 'Grapes', 'test'],
                    series: [20, 15, 40, 20]
                };

                var options = {
                    labelInterpolationFnc: function(value) {
                        return value[0]
                    }
                };

                var responsiveOptions = [
                    ['screen and (min-width: 640px)', {
                            chartPadding: 30,
                            labelOffset: 100,
                            labelDirection: 'explode',
                            labelInterpolationFnc: function(value) {
                                return value;
                            }
                        }],
                    ['screen and (min-width: 1024px)', {
                            labelOffset: 80,
                            chartPadding: 20
                        }]
                ];

                new Chartist.Pie('#chart2', data, options, responsiveOptions);
            </script>


        </div>
    </div>

</div>