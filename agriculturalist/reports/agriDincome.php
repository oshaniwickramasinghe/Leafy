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

          $sql="SELECT MONTH(Date) AS month_number, SUM(total_cost) AS revenue FROM leafy.deals WHERE agriculturalist_id = '$user_id' 
          GROUP BY MONTH(Date) ORDER BY month_number ASC ; ";

          $result1 = $pdo->query($sql);

            $acceptedcount = $result1->fetchAll(PDO::FETCH_ASSOC);

            ///////////////////////

            $count1 = [];
            $month = [];
          

            foreach ($acceptedcount as $element) {
                array_push($count1, (int) $element['revenue']);
                // array_push($month,  $element['week_number']);
               
            }

            foreach ($acceptedcount as $element) {
              // array_push($count1, (int) $element['order_count']);
              array_push($month,  $element['month_number']);
             
          }
           

        }catch(PDOException $e){
            die ("Error: unable to excecute $sql.".$e->getMessage());
        }   
    
    ?>


    <!-- <div class="chartCard">
      <div class="chartBox"> -->
        <canvas id="incomereport"></canvas>
      <!-- </div>
    </div> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
    // setup 
    <?php 
            echo "var month = ". json_encode($month) . ";\n";
            echo "var count1 = ". json_encode($count1) . ";\n";
            
    ?>

    const incomedata = {
      labels: month,
      datasets: [{
        label: 'monthly income',
        data: count1,
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
    const incomeconfig = {
      type: 'bar',
      data:incomedata,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const incomereport = new Chart(
      document.getElementById('incomereport'),
      incomeconfig
    );

    // Instantly assign Chart.js version
    const incomechartVersion = document.getElementById('incomechartVersion');
    incomechartVersion.innerText = Chart.version;
    </script>

  </body>
</html>