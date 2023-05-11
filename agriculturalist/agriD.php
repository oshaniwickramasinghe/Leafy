<?php 


include '../public/Auth.php';
include 'include/header.view.php';

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
    
    <!-- <link rel="stylesheet" href="../CSS/style.css"> -->
    <link rel="stylesheet" href="agristyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Order Report page</title>

    <style>
      /* * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      } */
      
      .chartCard {
        /* width: 100vw; */
        width: 600px;
        /* height: calc(100vh - 40px); */
        height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 600px;
        height: 350px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
      }
    </style>
</head>

<body>
    
<?php include "createpost_menu.php" ?>

<div class = "loggedhome_body">
<div class = "home_body">


    <div class="main_wrapper">


        <div class="content">
            <!-- <h2>Reports</h2> -->

           <!-- search Users by role-->
           <div class="box">
                
                <div class="container_right" id="view_more">
                    <div align="center">
                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include 'agriDordercount.php';?>
                        <h4>Monthly Orders</h4>
                        
                        </div>
                    </div>

                    <div class="chartCard">
                        <div class="chartBox">
                        <?php include 'agriDincome.php';?>

                        <h4>Monthly Income</h4>

                    
                        
                        </div>
                    </div>
                    </div>                    
                </div>

           </div>

           <!-- summary-->
           <div class="box">
             

           </div>

        </div>

    </div>
</div> 
</div>    

        <script src="getdetails.js"></script>
</body>
</html>