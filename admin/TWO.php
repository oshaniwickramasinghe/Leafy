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
    <title>side by side chart</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
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
    </style>

  </head>

  <body>

  <div class="chartCard">
    <div class="chartBox">
    <?php include 'charts/users_report.php';?>
    </div>
  </div>


  <div class="chartCard">
    <div class="chartBox">
    <?php include 'charts/blog_report.php';?>
    </div>
  </div>

  <div class="chartCard">
    <div class="chartBox">
    <?php include 'charts/course_report.php';?>
    </div>
  </div>



  
  
  

  <?php include 'testbarchart.php';?>
  <?php include 'testpiechart.php';?> 

      

  </body>
</html>