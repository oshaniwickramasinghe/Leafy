<?php 

//require "connect.php";
require "../public/Auth.php";
include "../public/includes/header.view.php";


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
            

        <title>
            Home
        </title> 

        <style>
        * {
            margin : 0;
            padding: 0;
            font-family: sans-serif;
        }
        
        .chartCard {
            margin-left: -200;
            width: 100vw;
            height: calc(70vh - 40px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .chartBox {
            
            margin: 50;
            width: 500px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(54, 162, 235, 1);
            background: white;
        }
        </style>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
   
<?php include "../public/includes/admin_menu.view.php"?>


<div class = "loggedhome_body">

    <div class = "home_body">

        
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

            
                <?php
                    try{

                        $sql = "SELECT * FROM leafy.user_count ";
                        $result = $pdo->query($sql);
                        if($result->rowCount()>0){
                            
                            $count = array();
                            
                            while($row=$result->fetch()){
                                $count[]=$row["count"];
                                
                            }
                            unset($result);
                        }
                        else{
                            echo "no records found from user";
                        }
                    }catch(PDOException $e){
                        die ("Error: unable to excecute $sql.".$e->getMessage());
                    }

                    try{

                        $sql = "SELECT * FROM leafy.duplicate_user_count ";
                        $result = $pdo->query($sql);
                        if($result->rowCount()>0){
                            
                            $colour = array();
                            
                            while($row=$result->fetch()){
                                $colour[]=$row["count"];
                                
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
                        
                        <div class="chartBox">
                            <canvas id="ABC"></canvas>
                        </div>
                    </div>

                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

                    <script>
                        // setup 
                        //setup block
                        const count = <?php echo json_encode($count);?>;
                            

                            const data = { 
                            labels: ['customer', 'agriculturalist', 'instructor', 'delivery_person'],
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


                        /////chart 2
                        
                        const colour = <?php echo json_encode($colour);?>;
                        // setup 
                        const theta = { 
                                labels: ['red', 'blue', 'yellow', 'green'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: colour,
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
                        /////end chart 2
                        </script>
                  
    </div>
</div>

<?php include '../public/includes/footer.view.php'?>