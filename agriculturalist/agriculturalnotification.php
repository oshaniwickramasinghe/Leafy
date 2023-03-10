<?php 


require "../public/Auth.php";
include "../public/includes/header.view.php";

// include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agrinotifi.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Agriculturalist Notification page</title>
</head>
<body>

    <?php

    $user_id =$_SESSION["USER_DATA"]["user_id"];
   

    $sql  =  "SELECT * FROM post WHERE user_id='$user_id' ";
   
    $result = mysqli_query($conn , $sql);

      // $query = "SELECT * FROM post ORDER BY post_id ASC";
      // //execute mysql query and store data in result
      // $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {

        while ($res = mysqli_fetch_array($result)) {
    ?>
    <div class="notification-row">
      <div class="notification-text">
        <p>Item Name -<?php echo $res['item_name'] ?></p>
        <p>Address - <?php echo $res['location'] ?></p>
        <p>Mobile Number -<?php echo $res['contact_no'] ?></p>
        
      </div>
      <div class="notification-buttons">
      <input  type="hidden" name="id1" value="1"> <!-- the ID of the record you want to update -->
      <input  type="submit" name="accept" value="Accept">

      <input type="hidden" name="id0" value="1"> <!-- the ID of the record you want to update -->
      <input type="submit" name="Delete" value="Delete">
      </div>
    </div>
    
   

    <?php
 
}
}
?>

    <footer>

<img src = "photos/Footer.svg"  height= "121.3px" style =  " margin-top:15%">
</footer>
    
</body>


</html>