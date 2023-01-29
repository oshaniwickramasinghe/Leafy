<?php

require "../../Customer/database.php";


//display items in the database
function display(){

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


      $sql = "SELECT * FROM `post` WHERE post_id ";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      $res =  mysqli_fetch_array($result);
      return $res;
      }


}


//add item to the cart
if(isset($_POST['cart'])){

  //check whether item already in the cart
    if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'],'post_id');
    // print_r($_SESSION['cart']);

    if(in_array($_POST['post_id'],$item_array_id)){
          echo "<script>alert('product already added')</script>";
          echo "<script>window.location='cart.view.php'</script>";
    }else{
      $count = count($_SESSION['cart']);
      $item_array = array(
        'post_id' => $_POST['post_id'],
        );

        $_SESSION['cart'][$count]= $item_array;
    }
    }else{

      $item_array = array(
      'post_id' => $_POST['post_id'],
      );

      $_SESSION['cart'][0] = $item_array;

    }
}

?>



<!-- delete item from the cart -->
<script>

function deleteItem(){
  if( confirm('Are you sure want to delete this item?') == true){
    <?php
    if (isset($_POST['remove'])){
    foreach ($_SESSION['cart'] as $key => $value){
       unset($_SESSION['cart'][$key]);
      }
      }
      ?>
  }
}
</script>