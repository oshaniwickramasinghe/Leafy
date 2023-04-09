<?php

require "../../Customer/database.php";
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


$product_id  = $_POST['post_id'];
$product_name = $_POST['item_name'];
$product_price = $_POST['price'];
$product_quantity =$_POST['quantity'];




//add item to the cart
if(isset($_POST['cart'])){





  if(isset ($_SESSION['cart'])){
    // $name= $_POST['item_name'];
    // $quan = $_POST['quantity'];
    // $id = $_SESSION['USER_DATA']['user_id'];
    // $sub =$_POST['quantity']*$_POST['price'];
    

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



?>



