<?php 
include '../public/Auth.php';
include '../public/includes/header.view.php';
$user_id =$_SESSION['USER_DATA']['user_id'];
$Qtt = $_REQUEST["Qtt"];
$mQtt = $_REQUEST["mQtt"];
$ex = $_REQUEST["ex"];
$price = $_REQUEST["price"];
$loc = $_REQUEST["loc"];
$img = $_REQUEST["img"];
$vegi = $_REQUEST["vegi"];
$postid=$_REQUEST["postid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edite post</title>
     <link rel="stylesheet" href="agristyle.css">
     
</head>




<body>

<div style="position: relative; height: 10vh;">
<div style="position: relative; height: 10vh;">
<br><br><br><br><br>

<?php 
include 'agri_menu.view.php';


?>
</div>

<br><br><br>
     <form action="post_function/eddite.post.php" method="post" enctype="multipart/form-data">


          <h1>Edite Post</h1>

          <span class="details">Category</span><br>
          <select class="select" name="category"  class="select" >
               <option value="Vegetable">Vegetable</option>
               <option value="Fruit">Fruit</option>
               <option value="seeds">Seeds</option>
          </select><br>


          <label for="uname">Name</label><br>
          <select class="select" value="<?php echo $vegi ?>"  class="select" name="fname">
               <option value="Beetroot">Beetroot</option>
               <option value="Big onion">Big onion</option>
               <option value="Bitter gourd">Bitter gourd</option>
               <option value="Bell Peppers">Bell Peppers</option>
               <option value="Cabbage">Cabbage</option>
               <option value="Carrots">Carrots</option>
               <option value="Calabrese">Calabrese</option>
               <option value="potatoes">potatoes</option>
               <option value="pumpkin">pumpkin</option>
               <option value="snake gourd">snake gourd</option>
          </select><br>
          <!-- <input type="text" placeholder="Enter item name" id="fname" name="fname" ><br> -->

          <!-- <label for="uname">post_id</label><br> -->
          <input type="hidden" placeholder="" value="<?php echo $postid?>" id="postid" name="postid" required><br>

          <label for="uname">Location</label><br>
          <input type="text" placeholder="" value="<?php echo $loc?>" id="location" name="location" required><br>

          

          <label for="uname">Quantity</label><br>
          <input type="text" placeholder="ff" value="<?php echo $Qtt ?>" id="quantity" name="quantity" required><br>

          <label for="uname">Minimum Quantity</label><br>
          <input type="text" placeholder="Enter Minimum Quantity in Kg" value="<?php echo $mQtt ?>" id="miniquantity" name="miniquantity" required><br>
          
          <label for="uname">Expiary Date</label><br>
          <input class="select" type="date" placeholder="Enter Expiary Date" value="<?php echo $ex ?>" id="exdate" name="exdate" required><br>

          <label for="uname">Price</label><br>
          <input type="text" placeholder="price" value="<?php echo $price ?>" id="price" name="price" required><br>

          <label for="uname">Images</label><br>
          <input type="file" placeholder="upload images" src="images/" value="<?php echo $img ?>" id="images" name="images" accept="images/jpg,images.jpeg,images/png" ><br> 

       

          <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>

     </form>
     <?php include '../includes/footer.view.php'?>
</div>




</body>

<script type="text/javascript">
    window.onload=function(){ 
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("exdate")[0].setAttribute('min', today);
    }

      </script> 

</html>
