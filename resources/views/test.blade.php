@extends('layouts.dashboard')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $page }}</div>

                <div class="card-body">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Aplikasi K-Means</h3>
                            <p class="panel-subtitle">This is Dashboard</p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
											<span class="number">#</span>
											<span class="title">Disaster Data</span>
										</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
                                            <span class="number">#</span>
											<span class="title">Geographic Data</span>
										</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>                                                                            
                                        <p>
                                            <span class="number">#</span>
											<span class="title">Nilai Korelassional</span>
										</p>                                             
                                    </div>
                                </div>
                            </div>                            
						</div>						                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
{{-- <script>    
    let disasterchart = Highcharts.chart('cluster', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Disaster Cluster'
        },        
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        
        series:  [{
            name: 'Jumlah Anggota Cluster',
            colorByPoint: true,
            data: (function(){
                // var query =  <?php echo json_encode(clusterGet()) ?>;
                // console.log(query);
				var data = [];
				let cluster = 'Cluster '
				for (var i = 0; i < query.length; i++) {
					data.push({
						name: cluster.concat(query[i].cluster),
						y: query[i].countcluster
					});
				}

				return data;
			}())		
        }]
    });

    let geochart = Highcharts.chart('geocluster', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Geo Cluster'
        },        
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        
        series:  [{
            name: 'Jumlah Anggota Cluster',
            colorByPoint: true,
            data: (function(){
                var query =  <?php echo json_encode(geoclusterGet()) ?>;
                // console.log(query);
				var data = [];
				let cluster = 'Cluster '
				for (var i = 0; i < query.length; i++) {
					data.push({
						name: cluster.concat(query[i].cluster),
						y: query[i].countcluster
					});
				}

				return data;
			}())		
        }]
    });
</script> --}}