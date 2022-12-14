<?php
include "db_con.php";

if(isset($_GET['name'])){
  $name = $_GET['name'];
$del = "DELETE FROM shopping_cart WHERE name = '$name'";
if( $_GET['name']=='Cabbage'){
           
    $sql = "UPDATE `items` SET `quantity` ='10' WHERE `items`.`id` = '1'";
    
    $up = mysqli_query($conn, $sql);
    }else if($_GET['name']=='Brinjal'){
       ;
       $sql = "UPDATE `items` SET `quantity` = '20' WHERE `items`.`id` = '2'";
       $up = mysqli_query($conn, $sql);
    }
  
 $result= mysqli_query($conn , $del);
 if($del){
     mysqli_close($conn); // Close connectio
      header("location:shopping_cart.php"); // redirects to all records page
         exit;	
   }
}
?>