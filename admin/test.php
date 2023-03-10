<!DOCTYPE html>
<html>
<head>
	<title>My Charts</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style type="text/css">
            * {
                margin: 0px;
                padding: 0;
                font-family: sans-serif;
            }
            
            .chartCard {
                width: 500px;
                height: 300px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .chartBox {
                width: 500px;
                padding: 20px;
                border-radius: 20px;
                border: solid 3px rgba(54, 162, 54, 1);
                background: white;
                margin-left: 100px;
            }
        
        </style>
</head>
<body>
	<!-- <canvas id="chart1"></canvas>
	<canvas id="chart2"></canvas>

	<script>
		// Chart 1 data and options
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
		var chart1 = new Chart(document.getElementById('chart1'), {
			type: 'bar',
			data: chart1Data,
			options: chart1Options
		});

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
	</script> -->
  <div class="chartCard">
    
    <div class="chartBox">
    <?php include 'testbarchart.php';?>
    </div>
  </div>
  
  <div class="chartCard">
    
    <div class="chartBox">
    <?php include 'testpiechart.php';?>
    </div>
  </div>
   
   
</body>
</html>
