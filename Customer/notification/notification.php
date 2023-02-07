<?php
include "../Auth.php";
include "../database.php";
include '../includes/header.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Notification</title>
</head>
<body>

  <div class = "notification_body">
    <h2>Notifications</h2>
<?php 

 $uid  = $_SESSION['USER_DATA']['user_id'];
 $sql  = "SELECT * FROM notification WHERE customer_id  = $uid";
 $result = mysqli_query($conn, $sql);
 

 if(mysqli_num_rows($result)>0){
    while($row =  mysqli_fetch_array($result)){

 ?>

       
              <div class  =  "rowone">
              <form method  = "post">

                 <h5><?= $row['n_id']?></h5>
                 <h5><?= $row['n_sub']?></h5>
                 <?php
                 date_default_timezone_set('Asia/Kolkata');
            $time = date("h:i:sa");

              // $dif  = $time-$row['time']
              ?>
                 <input  type  =  "time" value = "<?= $row['time']?>" readonly >

               </form>

              </div>
 <?php
     }

   }

   ?>
         </div>

         <!-- <script>
    function displayTime() {
        var date = new Date();
        var time = date.toLocaleTimeString();
        document.getElementById("time").innerHTML = time;
    }

    setInterval(displayTime, 1000);
</script>
     -->
</body>
<footer>
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</footer>
</html>