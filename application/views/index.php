<html>

<head>
	<title>Line Chart</title>
	<script src="./assets/js/Chart.bundle.js"></script>
	<script src="./assets/js/utils.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
</head>

<body>
	<div style="width:75%;">
		<canvas id="canvas"></canvas>
	</div>
	<br>
	<br>
	<button id="randomizeData">Randomize Data</button>
	<button id="addDataset">Add Dataset</button>
	<button id="removeDataset">Remove Dataset</button>
	<button id="addData">Add Data</button>
	<button id="removeData">Remove Data</button>
	
	<script>
		var DAYS = [];
		var DATAS = [];
		var day = new Date(2018, 6, 28);

		<?php for($i = 0; $i <= 11; $i++) : ?>
			DATAS.push('<?php echo date('d/m/Y', strtotime('+' . $i . ' days')) ?>');
			DAYS[<?php echo $i?>] = DATAS[<?php echo $i?>];
		<?php endfor;?>
		
		var config = {
			type: 'line',
			data: {
				labels: DAYS,
				datasets: [{
					label: 'Remaining tasks',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						10,
						9,
						8,
						7,
						6,
						5,
						4
					],
					fill: false,
				}, {
					label: 'bugs',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						25,
						21,
						15,
						10,
						8,
						3,
						1
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Burndown'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: day.getDate()+'/'+day.getMonth()+'/'+day.getFullYear()
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Tasks'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myLine.update();
		});
	</script>
</body>
</html>
