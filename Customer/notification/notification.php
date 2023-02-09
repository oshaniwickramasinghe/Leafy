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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
   integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <title>Notification</title>
</head>
<body>

   <!-- get the notification from the database -->
  <div class = "notification_body">
    <h2>Notifications</h2>

<?php
 $uid  = $_SESSION['USER_DATA']['user_id'];
 $sql  = "SELECT * FROM notification WHERE customer_id  = $uid";
 $result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result)>0){
    while($row =  mysqli_fetch_array($result)){

 ?>

              <div class  =  "rowone" style = "height:120px">
                <div class="right_row">
               <p><?= $row['n_id']?></p>
               <i class="fa fa-check-circle  fa-4x" aria-hidden="true"></i>

                </div>
                <div class="left_row">
                <form method  = "post">


        <b><p><?= $row['n_sub']?></p></b>
         <p><input type = "time"  value = "<?= $row['time'];?>" readonly> </p>

         <a href="#" type="button" id="view" onclick="showModal(); return false;" ><button class="text-danger" name  = "view" id  = "View">View</button></a>

         <!-- model box  -->
               </form>
               <div id="id01" class="modal" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  <form class="model-content" method = "post"  action="/action_page.php">
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

   }

   ?>
              <a href="../post/vegetable.php" type="button"><button>Back</button></a>

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

<footer>
<!-- <div class="footer-copyright">
            <p>copyright @2022 Leafy All Rights Reserved</p>
        </div> -->
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</footer>
</html>