<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <title>item analysis</title>
    
  </head>
  <body>

        <?php
            try{

                $sql = "SELECT MONTH(Date) AS month_number, SUM(total_cost) AS revenue FROM leafy.deals GROUP BY MONTH(Date) ORDER BY month_number ASC";

                
                $result = $pdo->query($sql);

                $orderincome = $result->fetchAll(PDO::FETCH_ASSOC);

                $revenue = [];
                $month_number = [];

                foreach ($orderincome as $element) {
                    array_push($revenue, (int) $element['revenue']);
                    array_push($month_number, $element['month_number']);
                }

                
            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }
            //unset($pdo);

            
        ?>

        <canvas id="orderincomechart"></canvas>
        
    <script>
    // setup 

        <?php 
            echo "var month_number = ". json_encode($month_number) . ";\n";
            echo "var revenue = ". json_encode($revenue) . ";\n";
        ?>

    const orderincomedata = {
      labels: month_number,
      datasets: [{
        label: 'income of the month',
        data: revenue,
        borderWidth: 1
      }]
    };

    // config 
    const orderincomeconfig = {
      type: 'line',
      data:orderincomedata,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const orderincomechart = new Chart(
      document.getElementById('orderincomechart'),
      orderincomeconfig
    );

    
    // Instantly assign Chart.js version
    const orderincomechartVersion = document.getElementById('orderincomechartVersion');
    orderincomechartVersion.innerText = Chart.version;
    </script>

  </body>
</html>