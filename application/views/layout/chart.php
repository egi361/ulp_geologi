                    <div class="clearfix"></div>
                    <div id="ch" class="col-md-12"></div>
<section class="content">	
    <div id="chart"></div>
</section>
<script>
    $(function() {
        new Highcharts.Chart({
            chart: {
                type: 'column',
                renderTo: 'chart'
            },
            title: {
                text: 'Grafik Satisfaction',
            },
            xAxis: {
                categories: <?= json_encode($status); ?>
            },
            yAxis: {
                title: {
                    text: 'Jumlah Data'
                }
            },
            credits: {
                enabled: false,
            },
            series: <?= json_encode($series); ?>
        })
    })
	
</script>