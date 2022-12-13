<?php
include "menu.php";

$host = "localhost";
$uname = "root";
$password = "";
$db_name = "customer_db";


$conn = mysqli_connect($host,$uname,$password,$db_name);

if(!$conn){
    echo"connection failed";
}
  


?>



<!DOCTYPE html>
<html>

<link rel = "stylesheet" href = "post.css">
<body>

<div  class = "container_1">
       
<h3>posts</h3>
    
        <div class = "row"> 
        <div class = "pagination">   
        <?php
         $result_per_page = 3;
          $query = "SELECT * FROM item ORDER BY id ASC";
          //execute mysql query and store data in result
          $result = mysqli_query($conn,$query);
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

            $query = "SELECT * FROM item LIMIT ".$page_first_result. ',' .$result_per_page;
            $result = mysqli_query($conn, $query);
         
          if(mysqli_num_rows($result)>0){
        
             while($row = mysqli_fetch_array($result)){
                ?>
                </div>
              <div class = "column">
                <div class = "cards">
                    <div class = "card_body">

                    <form method = "post" action  = "home.php?id=<?php echo $row['id']?>">
                    <img src="Images\<?php echo $row["image"];?>" width = "180" height="150">
                    <h5 class= "text_info">Name:<?php echo $row['name'];?></h5>
                    <h5>Location:<?=$row['location'];?></h5>
                    <h5>Quantity : <?php echo $row['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $row['price'];?> /kg</h5>
                    <input type = "hidden" name= "hidden_name" value = "<?php echo $row["name"];?>"/>
                    <input type = "hidden" name= "hidden_price" value = "<?php echo $row["price"];?>"/>
                     <input type= "submit" name= "Edit" class= "btn_1" value= "Edit" data-inline = "true"/>
                     <input type= "submit" name= "Delete" class= "btn_1" value= "Delete" data-inline = "true"/>

                    </form>
                    </div>
               </div>
             </div>
    <div class = "pagination">
             <?php
             }
          }
          if($page>= 2 ){
            echo "<a href='post.php?page=".($page-1)."'> Previous page </a>";
          }else{
            echo "<a href='post.php?page=".($page)."'> Previous page </a>";
          }

        
        

         for($i = 1; $i<= $number_of_page; $i++){
            if($i== $page){
            $pagLink= "<a class ='active' href='post.php?page=".$i."'>$i</a>";
            echo $pagLink;
            }else{
            $pagLink= "<a class = 'normal' href='post.php?page=".$i."'>$i</a>";
            echo $pagLink;
            }

         };

         

         if($page < $number_of_page){
            
             echo "<a href ='post.php?page=".($page+1)."'> Next page </=>";   

        }else{
              
        echo "<a href ='post.php?page=".($page)."'> Next page </=>"; 
        } 
        ?>
         </div>
 </div>
</div>
</div>

        





</html>