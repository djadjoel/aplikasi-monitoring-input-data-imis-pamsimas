<?php
echo'
</div>
</div>';
?>
<script src="<?php echo PLUGIN ?>/highchart/highcharts.js"></script>
<script src="<?php echo PLUGIN ?>/highchart/data.js"></script>
<script src="<?php echo PLUGIN ?>/highchart/exporting.js"></script>
<script>
	Highcharts.chart('datagrafikfas', {
		data: {
			table: 'ratafas'
		},
		chart: {
			type: 'bar'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		yAxis: {
			min: 0,
			title: {
				text: '% Progres Input',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		xAxis: {
			type: 'category',
			title: {
				text: null
			}
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		tooltip: {
			formatter: function () {
				return '<b>' + this.series.name + '</b><br/>' +
					this.point.y + ' ' + this.point.name.toLowerCase();
			}
		}
	});
</script>
<script>
	Highcharts.chart('datagrafikfs', {
		data: {
			table: 'ratafs'
		},
		chart: {
			type: 'bar'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		yAxis: {
			min: 0,
			title: {
				text: '% Progres Verifikasi',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		xAxis: {
			type: 'category',
			title: {
				text: null
			}
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		tooltip: {
			formatter: function () {
				return '<b>' + this.series.name + '</b><br/>' +
					this.point.y + ' ' + this.point.name.toLowerCase();
			}
		}
	});
</script>
<script>
	Highcharts.chart('datagrafikkab', {
		data: {
			table: 'ratakab'
		},
		chart: {
			type: 'column'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		yAxis: {
			allowDecimals: false,
			title: {
				text: '% Progres Input'
			}
		},
		xAxis: {
			type: 'category'
		},
		plotOptions: {
			series: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: true
			}
		},
		tooltip: {
			formatter: function () {
				return '<b>' + this.series.name + '</b><br/>' +
					this.point.y + ' ' + this.point.name.toLowerCase();
			}
		}
	});
</script>