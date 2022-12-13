<?php
include 'connect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>postview</title>
  <link rel="stylesheet" href="postview.css">
</head>

<body>
<button class = "btnn" onclick="document.location='createpost.php'"> Create Post </button>

  <div class="container">


    <div class="row">

      <?php

      
      $query = "SELECT * FROM postcreate ORDER BY itemID ASC";
      //execute mysql query and store data in result
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
      ?>
          <div class="border">
            <div class="column">
              <div class="cards">
                <div class="card_body">

                

                  <form method="post" action="postview.php?id=<?php echo $row['itemID'] ?>">

                  
                    <img src="images/<?php echo $row['img']; ?>" width="100" height="100">
                            
                    <h5 class="text_info">Name:<?php echo $row['fname']; ?></h5>
                    <h5>Location:<?= $row['flocation']; ?></h5>
                    <h5>Quantity : <?php echo $row['quantity'] ?>kg </h5>
                    <h5>Minimum Quantity : <?php echo $row['miniquantity'] ?>kg </h5>
                    <h5 class="text_danger">Price: Rs <?php echo $row['price']; ?> /kg</h5>
                    
                    <input type="hidden" name="hidden_name" value="<?php echo $row["fname"]; ?>" />
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                              

                    <input type="submit" name="add_to_cart" class="btn" value="Edit" data-inline="true" />
                    <input type="submit" name="add_to_wishlist" class="btn" value="Delete" data-inline="true" />

                  </form>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>


         

    </div>
  </div>
  </div>

 
</body>

</html>