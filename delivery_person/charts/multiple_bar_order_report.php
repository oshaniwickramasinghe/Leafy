<?php 
    $username= "root";
    $password= "";
    $database = "leafy";

    try{
        $pdo = new PDO("mysql:host=localhost;database=$database",$username,$password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("Error: not connected.".$e->getMessage());
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>multiple bar order report</title>
    
  </head>
  <body>
    <?php  
        try{

            $sql1 ="SELECT 
                        DATE_FORMAT(co.date, '%Y-%m') AS month,
                        COUNT(*) AS num_accepted_orders
                    FROM 
                        leafy.accepted_orders ao
                        JOIN leafy.checkout co ON ao.order_id = co.orderId
                    WHERE 
                        ao.sent_deli_id = 3 AND
                        ao.status = 1 AND 
                        co.date >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
                    GROUP BY 
                        DATE_FORMAT(co.date, '%Y-%m')
                    ORDER BY 
                        month DESC";
            
            $result1 = $pdo->query($sql1);

            $acceptedcount = $result1->fetchAll(PDO::FETCH_ASSOC);

            ///////////////////////
            $sql2 ="SELECT 
                        DATE_FORMAT(co.date, '%Y-%m') AS month,
                        COUNT(*) AS num_total_orders
                    FROM 
                        leafy.accepted_orders ao
                        JOIN leafy.checkout co ON ao.order_id = co.orderId
                    WHERE 
                        ao.sent_deli_id = 3 AND
                        -- ao.status = 1 AND 
                        co.date >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
                    GROUP BY 
                        DATE_FORMAT(co.date, '%Y-%m')
                    ORDER BY 
                        month DESC";
            
            $result2 = $pdo->query($sql2);

            $totalcount = $result2->fetchAll(PDO::FETCH_ASSOC);
            ///////////////////////

            $count1 = [];
            $count2 = [];
            $month = [];

            foreach ($acceptedcount as $element) {
                array_push($count1, (int) $element['num_accepted_orders']);
                //array_push($month, $element['month']);
            }
            foreach ($totalcount as $element) {
                array_push($count2, (int) $element['num_total_orders']);
                array_push($month, $element['month']);
            }

        }catch(PDOException $e){
            die ("Error: unable to excecute $sql1.".$e->getMessage());
        }   
    
    ?>


    <!-- <div class="chartCard">
      <div class="chartBox"> -->
        <canvas id="myChart"></canvas>
      <!-- </div>
    </div> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
    // setup 
    <?php 
            echo "var month = ". json_encode($month) . ";\n";
            echo "var count1 = ". json_encode($count1) . ";\n";
            echo "var count2 = ". json_encode($count2) . ";\n";
    ?>

    const data = {
      labels: month,
      datasets: [{
        label: 'Accepted count',
        data: count1,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          
        ],
        borderWidth: 1
      },
      {
        label: 'Total count',
        data: count2,
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',   
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
    </script>

  </body>
</html>