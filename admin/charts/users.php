<?php 
    $username= "student";
    $password= "student";
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
            .chartBox{
                width: 500px;
            }
        
        </style>
    </head>

    <body>

        <?php
            try{

                $sql = "SELECT * FROM leafy.user_count ";
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

        <div class="chartBox">
        <canvas id="ABC"></canvas>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            //setup block
            const count = <?php echo json_encode($count);?>;
           

            const theta = { 
            labels: ['red', 'blue', 'yellow', 'green'],
                datasets: [{
                    label: '# of Votes',
                    data: count,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        
                    ],
                    borderWidth: 1
                }]
            };
            //config block
            const config2 ={
                    type: 'bar',
                data:theta,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            //render block
            const ABC = new Chart(
                document.getElementById('ABC'),
                config2
            );
            
        </script>
    </body>

</html>