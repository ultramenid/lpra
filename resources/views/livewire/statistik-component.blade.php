<div class="absolute top-1 right-5 z-20" x-data=" {legend:false}">
    <div class="bg-white bg-opacity-50 px-2 rounded mt-1 w-96 py-2 "  >
        <div  class=" flex justify-between   items-center cursor-pointer" >
            <label  class="w-full mt-2 font-bold ">Statistik</label>
        </div>
        <p class="mt-2 text-sm font-light">Mencakup status konflik LPRA dengan Kawasan Hutan dan Perkebunan/APL lainnya.</p>
        <div class="flex gap-2 mt-4 text-3xl items-center" :class="{'mb-2': legend, 'mb-9': !legend}">
            Total : <h1 class=" font-bold text-4xl"> {{$totallpra}} </h1>
            LPRA
        </div>
        <div class="px-2" style="display: none !important" x-show="legend" x-transition  :class="{'block': legend, 'hidden': !legend}" x-data="{tematic: 'hutan'}">

            <div id="total"></div>
            <div id="tipologi"></div>
            {{-- <livewire:total-tipologi /> --}}
        </div>

        <div class="bottom-0 flex justify-center">
            <div class="rounded-lg px-6  bg-gray-500 bg-opacity-90 text-center -mb-7 cursor-pointer" @click="legend=!legend">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" stroke-width="0.1" stroke="none"  :class="{'rotate-180': legend, 'rotate-0': !legend}" class=" w-9 h-9 text-white transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" /></svg>
            </div>
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
            var options2 = {
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
            var chart1 = new ApexCharts(document.querySelector("#tipologi"), options2);
            chart.render();
            chart1.render();
        // })
    </script>

</div>
