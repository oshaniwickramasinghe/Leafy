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

<!DOCTYPE html>
<html lang="=en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale="1">
        <title>chart.js</title>
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

        <?php
            try{

                $sql = "SELECT * FROM leafy.duplicate_user_count ";
                $result = $pdo->query($sql);
                if($result->rowCount()>0){
                    
                     $count = array();
                    
                    while($row=$result->fetch()){
                        $count[]=$row["count"];
                        
                        echo $row["count"];
                    }
                    unset($result);
                }
                else{
                    echo "no records found";
                }
            }catch(PDOException $e){
                die ("Error: unable to excecute $sql.".$e->getMessage());
            }
            unset($pdo);

            
        ?>

    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
    
    </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            //setup block
            const count = <?php echo json_encode($count);?>;
           

            const data = { 
            labels: ['customer', 'agriculturalist', 'instructor', 'delivery_person'],
                datasets: [{
                    label: 'no of users',
                    data: count,
                    backgroundColor: [
                        'rgba(54, 162, 54, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(54, 162, 54, 1)',
                        
                    ],
                    borderWidth: 1
                }]
            };
            //config block
            const config ={
                    type: 'bar',
                data:data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            //render block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );  
            
            
        </script>

        
    </body>

</html>