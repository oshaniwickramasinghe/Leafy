<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.all.min.js" integrity="sha512-2JsZvEefv9GpLmJNnSW3w/hYlXEdvCCfDc+Rv7ExMFHV9JNlJ2jaM+uVVlCI1MAQMkUG8K83LhsHYx1Fr2+MuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
require "../../Customer/database/database.php";

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "leafy";


$conn = mysqli_connect($host,$uname,$password,$db_name);

//display items in the database
function display(){

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if(isset($_GET['post_id'])){
$id = $_GET['post_id'];


      $sql = "SELECT * FROM post WHERE post_id = $id ";
     
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      $res =  mysqli_fetch_array($result);
      $id = $res['post_id'];
      return $res;
      }
}else{
  $sql = "SELECT * FROM post ";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
  $res =  mysqli_fetch_array($result);
  $id = $res['post_id'];
  return $res;
  }
}
}

  // to avoid errors when submitting a form in HTML that sends data to a 
  // PHP script and that data is being accessed as an array without initializing.
if(isset( $_POST['post_id'])){
  $product_id  = $_POST['post_id'];
}
if(isset($_POST['item_name'])){
  $product_name = $_POST['item_name'];
}
if(isset($_POST['price'])){
  $product_price = $_POST['price'];
}
if(isset($_POST['quantity'])){
  $product_quantity =$_POST['quantity'];
}




//add item to the cart
if(isset($_POST['cart'])){
  if(isset ($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'] , 'post_id');
    if(!in_array($_POST['post_id'],$item_array_id)){

      $count = count($_SESSION['cart']);
      $item_array = array(
        'post_id' =>$product_id,
        'item_name' =>$product_name,
        'price'=>$product_price,
         'quantity'=>$product_quantity,
        
 
       );
       $_SESSION['cart'][$count]= $item_array;
     
       header("location:cart.view.php?post_id=$product_id");
     
    }else{
           echo '<script>alert("Item already added")</script>';
           echo '<script>window.location ="cart.view.php?post_id=</script>'.$product_id;
    }
  
  }else{
      $item_array = array(
        'post_id' =>$product_id,
        'item_name' =>$product_name,
        'price'=>$product_price,
         'quantity'=>$product_quantity,

      );

      $_SESSION['cart'][ '0'] = $item_array;

      header("location:cart.view.php?post_id= $product_id");
  }
}
 

//add item to wishlist
if(isset($_POST['wishlist'])){
  $id = $_POST['post_id'];
     $sql = "SELECT * FROM post WHERE post_id = $id ";
    $result = mysqli_query($conn,$sql);
    $res =  mysqli_fetch_array($result);
    $id =$res['post_id'];
    $user = $_SESSION['USER_DATA']['user_id'];
    $query  = "SELECT * FROM wishlist WHERE user_id = $user && post_id =$id";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
     ?>
     <script>
     window.location.href ="cart.view.php?post_id=<?php echo $id?>";
     alert("Item already added");
   </script>
   <?php
    }else{
    $sql = "INSERT INTO wishlist (post_id, user_id) VALUES ($id,$user)";
    $result = mysqli_query($conn,$sql);
     ?>
     <script>
      window.location.href ="cart.view.php?post_id=<?php echo $id?>";
      alert("Item added to the wishlist");
    </script>
     <?php

    }
}




?>



