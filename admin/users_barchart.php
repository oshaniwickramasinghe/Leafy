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
                width: 700px;
            }
        
        </style>
    </head>

    <body>

        <?php
            try{

                $sql = "SELECT * FROM leafy.barchart WHERE id=1";
                $result = $pdo->query($sql);
                if($result->rowCount()>0){
                    $revenue = array();
                    $cost = array();
                    $profit = array();
                    
                    while($row=$result->fetch()){
                        $revenue[]=$row["revenue"];
                        $cost[]=$row["cost"];
                        $profit[]=$row["profit"];
                        echo $row["revenue"];
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
        <canvas id="myChart"></canvas>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            //setup block
            const revenue = <?php echo json_encode($revenue);?>;
            const cost = <?php echo json_encode($cost);?>;
            const profit = <?php echo json_encode($profit);?>;

            const data = { 
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','1','2','3','4'],
                datasets: [{
                    label: '# of Votes',
                    data: revenue,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        
                    ],
                    borderWidth: 1
                },{
                    label: '# of Votes',
                    data: cost,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        
                    ],
                    borderWidth: 1
                },{
                    label: '# of Votes',
                    data: profit,
                    backgroundColor: [  
                        'rgba(75, 192, 192, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        
                    ],
                    borderWidth: 1
                }]
            };
            //config block
            const config ={
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
            //render block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
            
        </script>
    </body>

</html>