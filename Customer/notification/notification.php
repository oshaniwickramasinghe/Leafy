<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/delivery.css">

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
    <link rel="stylesheet" href="../CSS/delivery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
   integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/6b34f3c462.css" crossorigin="anonymous">
    <title>Notification</title>
</head>
<body>

   <!-- get the notification from the database -->
<div class = "notification_body">
<h2>Notifications</h2>

<?php
 $uid  = $_SESSION['USER_DATA']['user_id'];
    // get the notification send by agriculturalist
 $sql  = "SELECT * FROM notification WHERE customer_id  = $uid";
 $result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result)>0){
    while($row =  mysqli_fetch_array($result)){
 ?>

              <div class  =  "rowone" style = "height:120px">
               <div class="right_row">
               <p><?= $row['n_id']?></p>
               <input type = "hidden" name= "id" value = "<?php echo $row['n_id']; ?>">
               <i class="fa fa-check-circle  fa-4x" aria-hidden="true"></i>
              </div>

                <div class="left_row">
                <form method  = "post" action =  "notification.php">
                <input type = "hidden" name= "id" value = "<?php echo $row['n_id']; ?>">

                <b><p><?= $row['n_sub']?></p></b>
                <p><input type = "time"  value = "<?= $row['time'];?>" readonly> </p>
                <a href="#" type="button" id="view" name = "view"  onclick="showModal(); return false;" ><button class="text-danger" name  = "view" id  = "View">View</button></a>

               <!-- model box  -->
               </form>
               <div id="id01" class="modal" style="display: none;">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="model-content" method = "post"  action="">
                <?php

               $id  =  $row['n_id'];
               $sql  = "UPDATE `notification` SET status  = 1 WHERE  customer_id  = $uid && n_id  = $id ";
               $res = mysqli_query($conn, $sql);?>
               
                      <div class  = "model_body">
                      <img src="../images/logo.svg"  height= "120px" >
                           <h1><?= $row['n_sub']?></h1>
                           <p> <b>Yor order has been successfully completed</b><br>
                               Please click on below link to give rate and reviews.<b><a href  = "../rate/rate.php">Click here</a></b>
                               <br>
                           </p>
                           <p><input type = "time"  value = "<?= $row['time'];?>" readonly> </p>
                    </div> 
                    </form>
                </div>
               </div>
              </div>
 <?php
     }

   }else{?>

<div class = "Empty"><p>You haven't received any notification yet.</p>
<i class="fa-regular fa-envelope fa-7x"></i>
</div>

<?php  } ?>

</div>
<br><br><br> <a href="../post/vegetable.php" type="button"><button name  = "back" style = "margin-left:25%; border: none;">Back </button></a>
<div class="footer">
<img src = "../images/Footer.svg"  height= "120px" style = "margin-top:auto">
</div>
</body>


  <!-- js function to display the model form -->
<script>
 function showModal() {
            document.getElementById("id01").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("id01").style.display = "none";
        }

        function deleteDetails() {

        hideModal();
        }
  </script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql  = "UPDATE `notification` SET status  = 1 WHERE  customer_id  = $uid  ";
  $result = mysqli_query($conn, $sql);
  // var_dump(  $result );
}?>

</html>
