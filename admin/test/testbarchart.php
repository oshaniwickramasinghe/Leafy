<!DOCTYPE html>
<html>
<head>
	<title>My Charts</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- canvas id changes -->
	<canvas id="chart1"></canvas>
	

	<script>
		// Chart 1 data and options
        // data name changes
		var chart1Data = {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'Sales',
				data: [12, 19, 3, 5, 2, 3, 12],
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgba(255, 99, 132, 1)',
				borderWidth: 1
			}]
		};

        // options name changes
		var chart1Options = {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		};

		// Create Chart 1
        // object name changes
		var chart1 = new Chart(document.getElementById('chart1'), {
			type: 'bar',
			data: chart1Data,
			options: chart1Options
		});

		
	</script>
</body>
</html>
