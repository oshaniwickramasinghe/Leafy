<?php 
require "../../database/database.php";
require "../../public/Auth.php";
include '../includes/header.php';
?>

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../notification.css">
    <link rel="stylesheet" href="../../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Income chart</title>

    <style>
      
      .chartCard {
        /* width: 100vw; */
        width: 500px;
        /* height: calc(100vh - 40px); */
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 500px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }

      .main_wrapper .content .box .container_left .main_card .card_left ul li a {
            width: 98%;
            /* width: 200px;  */
        }


        .main_wrapper .content .box .container_left .main_card .card_left table {
            table-layout: fixed; 
            width: 100%;
            
        }
    </style>
</head>

<body>
    <?php include 'AdminReportPHP.php';?>
    <?php include "../menu/admin_menu.view.php"?>

<div class = "loggedhome_body">
<div class = "home_body">
    <div class="main_wrapper"> 
    <!-- <div class="report"> -->

        <div class="content">

            <h2>Reports</h2>

            

            <!-- search Users by role-->
            <div class="box">

            <!-- <div class="container_left"> -->
            <!-- <div class="main_card"> -->
            <!-- <div class="card_left"> -->

                <!-- <div class="center">
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php //include '../../admin/charts/item_analysis.php';?>
                        </div>
                    </div>
                </div> -->

                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->


            </div>

                <div class="container_right" id="view_more">
                    <div align="center">
                    <!-- <div class="chartCard"> -->
                        <div class="chartBox">
                        <?php include '../../admin/charts/users.php';?>
                        
                        </div>
                    <!-- </div> -->
                    </div>                    
                </div>

          

        </div>

    <!-- </div> -->
</div> 
</div>
</div>    

        <script src="notification.js"></script>
</body>
</html>