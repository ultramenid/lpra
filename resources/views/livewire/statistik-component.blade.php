<div class="absolute top-1 right-5 z-20">
    <div class="bg-white bg-opacity-50 px-2 rounded mt-1 w-96 py-2 " x-data=" {legend:false}" >
        <div :class="{'w-full': legend, 'w-96': !legend}" class=" flex justify-between   items-center cursor-pointer" @click="legend=!legend ">
            <label  class="w-full mt-2 font-bold ">Statistik</label>
            <div>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': legend, 'rotate-180 mr-4 ': !legend}" class="inline w-4 h-4 items-center transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
        <div class="px-2" style="display: none !important" x-show="legend" :class="{'block': legend, 'hidden': !legend}" x-data="{tematic: 'hutan'}">
            <h1 class="mt-4 text-4xl">{{$totallpra}} LPRA</h1>
            <div id="total"></div>
            <div id="tipologi"></div>
            {{-- <livewire:total-tipologi /> --}}
        </div>

    </div>
    <script>
        // document.addEventListener('livewire:load', function () {
            String.prototype.toProperCase = function () {
                return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
            };
            var lpraregion = JSON.parse('<?php echo $lpraregion;  ?>');
            var totaltipologi = JSON.parse('<?php echo $totaltipologi;  ?>');
            // console.log(totaltipologi)
            var options = {
                    chart: {
                        type: 'bar',
                        height: 'auto'
                    },
                    series: [{
                        name: 'lpra',
                        data: lpraregion.jumlahlpra
                    }],
                    xaxis: {
                        categories: lpraregion.region
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            dataLabels: {
                                total: {
                                    enabled: true,
                                    style: {
                                    fontSize: '13px',
                                    fontWeight: 900
                                    }
                                }
                            }
                        }
                    },
            }
            var options1 = {
                series: totaltipologi.totaltipologi,
                chart: {
                id: 'totaltipologi',
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
                    enabled: false,
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

            Livewire.on('updateChart', dataUpdate => {
                updated = JSON.parse(dataUpdate);
                // console.log()
                chart.updateOptions({
                    chart: {
                        animate: true
                    },
                    xaxis: {
                        categories: updated.region
                    },
                    series: [{
                        data: updated.jumlahlpra
                    }],
                    dataLabels: {
                        enabled: true,
                    },
                    tooltip: {
                    y: {
                            formatter: function(value) {
                            return value ;
                            }
                        }
                    },

                });
                // console.log(updated)
            });
            Livewire.on('updateTipologi', data => {
                tipologi = JSON.parse(data);
                chart1.updateOptions({
                    chart: {
                        animate: true
                    },
                    series: tipologi.totaltipologi,
                    dataLabels: {
                        enabled: true,
                        formatter: function (val, opts) {
                            return opts.w.config.series[opts.seriesIndex]+ " ha"
                        },
                    },
                });
                // console.log(updated)
            })

            var chart = new ApexCharts(document.querySelector("#total"), options);
            var chart1 = new ApexCharts(document.querySelector("#tipologi"), options1);
            chart.render();
            chart1.render();
        // })
    </script>

</div>
