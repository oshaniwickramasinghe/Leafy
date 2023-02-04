<?php 

include '../public/Auth.php';
include '../public/includes/header.view.php';
include 'database.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>postview</title>
  <link rel="stylesheet" href="../Customer/CSS/style.css">
</head>

<body>

<?php 
include '../public/includes/agri_menu.view.php';
?>
<!-- <button class = "btnn" onclick="document.location='createpost.php'"> Create New Post </button> -->

<div class="container">


    <div class="row">

    <?php
    $sql  =  "SELECT * FROM post WHERE post_id ";
    $result = mysqli_query($conn , $sql);

    if(mysqli_num_rows($result)>0){
        while($res =  mysqli_fetch_array($result)){
?>
          <!-- <div class="border">
            <div class="column">
              <div class="agri_cards"> -->
                <div class="card_agribody">

                

                  <form method="post" action="postview.php">

             
                    <img src="images/<?php echo $row['img']; ?>" width="100" height="100"> 
                            
                    <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                   <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                  
                    <h5>District:  <?=$res['district'];?></h5>
                    
                  
                    <?php $id =$res["post_id"];?>
                    <input type = "hidden" name= "item_name" value = "<?php echo $res['item_name']; ?>">
                    <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                    <input type = "hidden" name= "quantity" value = "<?php  echo $res['quantity']; ?>">
                    <input type = "hidden" name= "price" value = "<?php echo $res['unit_price']; ?>">
                     <input type= "submit" name= "Eddite" class= "btn" value= "Eddite" data-inline = "true"/>
                    <input type= "submit" name= "Delete" class= "btn" value= "Delete" data-inline = "true"/>


                                

                    <input type="submit" name="add_to_cart" class="btn" value="Edit" data-inline="true" />
                    <input type="submit" name="add_to_wishlist" class="btn" value="Delete" data-inline="true" />

                  </form>
                </div>
              <!-- </div>
            </div>
          </div> -->
      <?php
        }
      }
      ?>


    </div>
  </div>
  </div>
</body>

</html>

<?php include '../includes/footer.view.php'?>