<div>
    <div id="tipologi"></div>
    <script>
            var totaltipologi = JSON.parse('<?php echo $totaltipologi;  ?>');
            // console.log(totaltipologi)

            var options1 = {
            series: totaltipologi.totaltipologi,
            chart: {
            width: '100%',
            type: 'pie',
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                    return value.toLocaleString('en-US') + " ha";
                    }
                }
                },
            dataLabels: {
                formatter: function (val, opts) {
                    return opts.w.config.series[opts.seriesIndex].toLocaleString('en-US')+' ha'
                },
            },
            stroke: {
                show: false,

            },
            legend: {
                position: 'bottom',
                show: false
            },
            labels: totaltipologi.tipologi,
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                width: 200
                },
            }
            }]
            };

            var chart1 = new ApexCharts(document.querySelector("#tipologi"), options1);
             Livewire.on('updateTipologi', data => {
                tipologi = JSON.parse(data);
                // console.log(tipologi.totaltipologi)
                chart1.updateOptions({
                    series: [{
                        data: tipologi.totaltipologi
                    }]
                });
                // console.log(updated)
            })
            chart1.render();




    </script>
</div>
