<?php
include '../Auth.php';
include '../include/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>create post</title>
     <link rel="stylesheet" href="agrinotifi.css">
     <link rel="stylesheet" href="delivery.css">
     <link rel="stylesheet" href="../agristyle.css">
     <link rel="stylesheet" href="../CSS/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>




<body>

   
          <div>
              
               <?php include "../include/createpost_menu.php" ?>
          </div>




          <form action="user.php" method="post" enctype="multipart/form-data " style="    margin-top: -25%;">


               <h1>Create Post</h1>

               <span class="details">Category</span><br>
               <select class="select" name="category" class="select">
                    <option value="Vegetable">Vegetable</option>
                    <option value="Fruit">Fruit</option>
                    <option value="seeds">Seeds</option>
               </select><br>


               <label for="uname">Name</label><br>
               <select class="select" class="select" name="fname">
                    <option value="Beetroot">Beetroot</option>
                    <option value="Big onion">Big onion</option>
                    <option value="Brinjal">Brinjal</option>
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

               <label for="uname">Location</label><br>
               <input type="text" placeholder="Enter Your location" id="location" name="location" required><br>

               <label for="uname">Quantity</label><br>
               <input type="text" placeholder="Quantity" id="quantity" name="quantity" required><br>

               <label for="uname">Minimum Quantity</label><br>
               <input type="text" placeholder="Enter Minimum Quantity in Kg" id="miniquantity" name="miniquantity" required><br>

               <label for="uname">Expiary Date</label><br>
               <input class="select" type="date" placeholder="Enter Expiary Date" id="exdate" name="exdate" required><br>

               <label for="uname">Price</label><br>
               <input type="text" placeholder="price" id="price" name="price" required><br>

               <label for="uname">Images</label><br>
               <input type="file" placeholder="upload images" id="images" name="images" accept="images/jpg,images.jpeg,images/png"><br>

               <!-- <input class="button" type="submit" value="Uplaod files"><br><br> -->

               <input type="submit" class="btn btn-primary w-100 " value="Submit" name=""></input>



          </form>



          <?php include '../include/footer.php' ?>

    






</body>

<script type="text/javascript">
     window.onload = function() {
          var today = new Date().toISOString().split('T')[0];
          document.getElementsByName("exdate")[0].setAttribute('min', today);
     }
</script>

</html>




<?php //include '../includes/footer.view.php' 
?>