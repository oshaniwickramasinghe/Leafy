<?php
require "../Auth.php";
include '../includes/header.php';
include '../database.php';

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "leafy";


$conn = mysqli_connect($host,$uname,$password,$db_name);

if(!$conn){
    echo"connection failed";
}


// function display(){

//     $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    
//           $sql = "SELECT * FROM `post` WHERE post_id = 5";
//           $result = mysqli_query($conn,$sql);
//           if(mysqli_num_rows($result)>0){
//           $res =  mysqli_fetch_array($result);
//           var_dump( $res );
//           return $res;
//           }
    
    
//     }


?>




<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../CSS/style.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
   integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <title>Vegetables</title>
    <?php include '../includes/menu.view.php'?>

<div class = "row">
        <div class = "pagination">
        <?php
         $result_per_page = 4;
          $query = "SELECT * FROM post ORDER BY post_id ASC";
          //execute mysql query and store data in result
          $result = mysqli_query($conn,$query);

          $row = mysqli_fetch_array($result);

          $number_of_result =  mysqli_num_rows($result);

          //number of pages available
          $number_of_page = ceil($number_of_result/$result_per_page );
           $pagLink = "";
          if(!isset($_GET['page'])){
              $page  = 1;
          }else{
            $page = $_GET['page'];
          }

            $page_first_result= ($page-1)* $result_per_page;

            $query = "SELECT * FROM post LIMIT ".$page_first_result. ',' .$result_per_page;
            $result = mysqli_query($conn, $query);

          if( mysqli_num_rows($result)>0){

             while($row = mysqli_fetch_array($result)){
                ?>
                </div>
           
<div class = "column">
<form method  = "Post " action  =  "../shopping_cart/cart.view.php">  
                <div class = "cards">
                    <div class = "card_body">

                    <img src="../images/<?php echo $row["image"];?>" width = "180" height="150">
                    <div class="detail"> 
                    <h5 class= "text_info">Name:<?php echo $row['item_name'];?></h5>
                    <h5>Location:<?=$row['district'];?></h5>
                    <h5>Quantity : <?php echo $row['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $row['unit_price'];?> /kg</h5> 
                </div>
                <?php $id =$row["post_id"];
                ?>
               

               <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                  <input type= "submit" name= "cart" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                  <input type= "submit" name= "wishlist" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>

                  </div>
                </div>
      </div>
             </form>
            </div>

    <div class = "pagination">
             <?php
             }
          }
          if($page>= 2 ){
            echo "<a href='vegetable.view.php?page=".($page-1)."'> Previous page </a>";
          }else{
            echo "<a href='vegetable.view.php?page=".($page)."'> Previous page </a>";
          }


         for($i = 1; $i<= $number_of_page; $i++){
            if($i== $page){
            $pagLink= "<a class ='active' href='vegetable.view.php?page=".$i."'>$i</a>";
            echo $pagLink;
            }else{
            $pagLink= "<a class = 'normal' href='vegetable.view.php?page=".$i."'>$i</a>";
            echo $pagLink;
            }

         };

         

         if($page < $number_of_page){
            
             echo "<a href ='vegetable.view.php?page=".($page+1)."'> Next page </=>";   

        }else{
              
        echo "<a href ='vegetable.view.php?page=".($page)."'> Next page </=>"; 
        } 
        ?>
         </div>
 


        


    
</head>
<body>

</body>
</html>