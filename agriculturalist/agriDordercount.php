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

          $user_id = $_SESSION["USER_DATA"]["user_id"];

          $sql="SELECT MONTH(date) AS week_number, COUNT(*) AS order_count
          FROM leafy.checkout WHERE agriculturalist_id = '$user_id'
          GROUP BY WEEK(date)
          ORDER BY week_number ASC ";

          $result1 = $pdo->query($sql);

            $acceptedcount = $result1->fetchAll(PDO::FETCH_ASSOC);

            ///////////////////////

            $count1 = [];
            $month = [];
          

            foreach ($acceptedcount as $element) {
                array_push($count1, (int) $element['order_count']);
                // array_push($month,  $element['week_number']);
               
            }

            foreach ($acceptedcount as $element) {
              // array_push($count1, (int) $element['order_count']);
              array_push($month,  $element['week_number']);
             
          }
           

        }catch(PDOException $e){
            die ("Error: unable to excecute $sql.".$e->getMessage());
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
            
    ?>

    const data = {
      labels: month,
      datasets: [{
        label: 'Order count',
        data: count1,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          
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