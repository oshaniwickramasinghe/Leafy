<?php 
    $username= "root";
    $password= "";
    $database = "leafy";

    try{
        $pdo = new PDO("mysql:host=localhost;database=$database",$username,$password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "connection succefull";
    }catch(PDOException $e){
        die("Error: not connected.".$e->getMessage());
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getting Started with Chart JS with www.chartjs3.com</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(54, 162, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>
  </head>
  <body>

        <?php
            try{

                //$sql = "SELECT * FROM leafy.user_count ";
                $sql = "SELECT COUNT(order_id) AS count, Month(Date) as month FROM leafy.order GROUP BY month ORDER BY COUNT(order_id)";
                
                $result = $pdo->query($sql);

                $ordercount = $result->fetchAll(PDO::FETCH_ASSOC);

                $count = [];
                $month = [];

                foreach ($ordercount as $element) {
                    array_push($count, (int) $element['count']);
                    array_push($month, $element['month']);
                }

                // if($result->rowCount()>0){
                    
                //      $colour = array();
                    
                //     while($row=$result->fetch()){
                //         $colour[]=$row["count"];
                        
                //         echo $row["count"];
                //     }
                //     unset($result);
                // }
                // else{
                //     echo "no records found";
                // }
            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }
            unset($pdo);

            
        ?>


    
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
        <input oninput="updateChart(this)" type="range" id="points" value="2" min="0" max="2">
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
    // setup 

        <?php 
            echo "var month = ". json_encode($month) . ";\n";
            echo "var count = ". json_encode($count) . ";\n";
        ?>

    const data = {
      labels: month,
      datasets: [{
        label: 'orders by month',
        data: count,
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

    function updateChart(range)
    {
        console.log(range);
        const rangeValue= month.slice(0,range.value);
        myChart.config.data.labels=rangeValue;
        myChart.update()

    };
    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
    </script>

  </body>
</html>