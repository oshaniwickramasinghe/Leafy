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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
   
<?php include "../public/includes/admin_menu.view.php"?>


<div class = "loggedhome_body">

    <div class = "home_body">

        <ul>
            <div class  = "col-13 ">
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

                        $sql1 = "SELECT * FROM leafy.user_count ";
                        $result1 = $pdo->query($sql1);
                        if($result1->rowCount()>0){
                            
                                $count = array();
                            
                            while($row=$result1->fetch()){
                                $count[]=$row["count"];
                                
                                echo $row["count"];
                            }
                            unset($result1);
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
                            const count = <?php echo json_encode($count);?>;
                        

                            const data1 = { 
                            labels: ['customer', 'agriculturalist', 'instructor', 'delivery_person'],
                                datasets: [{
                                    label: '# of Votes',
                                    data1: count,
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
                            const config1 ={
                                    type: 'bar',
                                data1,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            };
                            //render block
                            const myChart2 = new Chart(
                                document.getElementById('myChart2'),
                                config
                            );
                            
                        </script>
            


            </div>

            <div class  = "col-13 ">
                
                <?php
                    try{

                        $sql1 = "SELECT * FROM leafy.user_count ";
                        $result1 = $pdo->query($sql1);
                        if($result1->rowCount()>0){
                            
                                $count = array();
                            
                            while($row=$result1->fetch()){
                                $count[]=$row["count"];
                                
                                echo $row["count"];
                            }
                            unset($result1);
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
                            const count = <?php echo json_encode($count);?>;
                        

                            const data2 = { 
                            labels: ['customer', 'agriculturalist', 'instructor', 'delivery_person'],
                                datasets: [{
                                    label: '# of Votes',
                                    data2: count,
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
                                data2,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            };
                            //render block
                            const myChart1 = new Chart(
                                document.getElementById('myChart1'),
                                config
                            );
                            
                        </script>
            


            </div>
        </ul>
    </div>
</div>

<?php include '../public/includes/footer.view.php'?>