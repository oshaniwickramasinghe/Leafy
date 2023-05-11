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

                $sql = "SELECT item_name, COUNT(*) AS item_count FROM leafy.deals WHERE Date >= DATE_SUB(NOW(), INTERVAL 12 MONTH) GROUP BY item_name ORDER BY item_count DESC";

                
                $result = $pdo->query($sql);

                $itemcount = $result->fetchAll(PDO::FETCH_ASSOC);

                $item_count = [];
                $item_name = [];

                foreach ($itemcount as $element) {
                    array_push($item_count, (int) $element['item_count']);
                    array_push($item_name, $element['item_name']);
                }

              
            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }

            
        ?>


    
        <canvas id="itemchart"></canvas>
       
    <script>
    // setup 

        <?php 
            echo "var item_name = ". json_encode($item_name) . ";\n";
            echo "var item_count = ". json_encode($item_count) . ";\n";
        ?>

    const itemdata = {
      labels: item_name,
      datasets: [{
        label: 'no of items sold',
        data: item_count,
        borderWidth: 1
      }]
    };

    // config 
    const itemconfig = {
      type: 'pie',
      data:itemdata,
    
    };

    // render init block
    const itemchart = new Chart(
      document.getElementById('itemchart'),
      itemconfig
    );

   
    // Instantly assign Chart.js version
    const itemchartVersion = document.getElementById('itemchartVersion');
    itemchartVersion.innerText = Chart.version;
    </script>

  </body>
</html>