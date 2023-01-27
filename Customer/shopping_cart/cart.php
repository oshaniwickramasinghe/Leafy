<?php




function display(){
$host = "localhost";
$uname = "root";
$password = "";
$db_name = "leafy";


$conn = mysqli_connect($host,$uname,$password,$db_name);

      $sql = "SELECT * FROM `post`";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      $res =  mysqli_fetch_array($result);
  
    //   var_dump($res);
      return $res;
      }


}


if(isset($_POST['add'])){
  // print_r($_POST['post_id']);

 
    if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'],'post_id');
    // print_r($_SESSION['cart']);
    // var_dump(in_array($_POST['post_id'],$item_array_id));
    
    
    if(in_array($_POST['post_id'],$item_array_id)){
          echo "<script>alert('product already added')</script>";
          echo "<script>window.location='cart.view.php'</script>";
    }else{
      $count = count($_SESSION['cart']);
      $item_array = array(

        'post_id' => $_POST['post_id'],
  
        );

        $_SESSION['cart'][$count]= $item_array;
        // print_r( $_SESSION['cart']);
    }

    }else{

      $item_array = array(

      'post_id' => $_POST['post_id'],

      );

      $_SESSION['cart'][0] = $item_array;
       
    }
}

function cart(){
  $host = "localhost";
$uname = "root";
$password = "";
$db_name = "leafy";


$conn = mysqli_connect($host,$uname,$password,$db_name);

     
      // return $res;
}

