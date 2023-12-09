<div>
    {{-- Stop trying to control. --}}
    <div id="total"></div>
    <script>
        document.addEventListener('livewire:load', function () {
            var lpraregion = JSON.parse('<?php echo $lpraregion;  ?>');
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

            var chart = new ApexCharts(document.querySelector("#total"), options);
            Livewire.on('updateChart', dataUpdate => {
                updated = JSON.parse(dataUpdate);
                // console.log()
                chart.updateOptions({
                    xaxis: {
                        categories: updated.region
                    },
                    series: [{
                        data: updated.jumlahlpra
                    }],
                });
                console.log(updated)
            })
            chart.render();
        })
    </script>
</div>
