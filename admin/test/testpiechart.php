<!DOCTYPE html>
<html>
<head>
	<title>My Charts</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
	<canvas id="chart2"></canvas>

	<script>
		

		// Chart 2 data and options
		var chart2Data = {
			labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			datasets: [{
				label: 'Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange'],
				borderWidth: 1
			}]
		};

		var chart2Options = {
			legend: {
				position: 'bottom'
			}
		};

		// Create Chart 2
		var chart2 = new Chart(document.getElementById('chart2'), {
			type: 'doughnut',
			data: chart2Data,
			options: chart2Options
		});
	</script>
</body>
</html>
