<?php
require "../Auth.php";

include '../database.php';
include '../includes/header.php';
include "paginationseed.php";
include "search.php";

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
    <title>Seeds</title>
  
<body>
<div class  = "menu">
<?php include '../includes/menu.view.php'?>
</div>
  <div class = "vegetable_body">
<div class = "row">
<?php
$count= 0;
$result  = mysqli_query($conn , $query);


if(isset($_POST['wishlist'])){

  $id = $_POST['post_id'];
     $sql = "SELECT * FROM post WHERE post_id = $id  ";
     
    $result = mysqli_query($conn,$sql);
    $res =  mysqli_fetch_array($result);
    $id =$res['post_id'];
    $user = $_SESSION['USER_DATA']['user_id'];
    $query  = "SELECT * FROM wishlist WHERE user_id = $user && post_id =$id";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
      echo '<script>alert("Item already added")</script>';
     echo '<script>window.location ="cart.view.php?post_id=</script>'.$id;
    }else{
    $sql = "INSERT INTO wishlist (post_id, user_id) VALUES ($id,$user)";
    $result = mysqli_query($conn,$sql);
    echo '<script>alert("Item added to the wishlist")</script>';
     echo '<script>window.location ="cart.view.php?post_id=</script>'.$id;
    }
}

if($search){
  $query = "SELECT * FROM post WHERE  district LIKE '{$find}%' AND  (category = 'seed' )   LIMIT  ".$page_first_result. ','.$result_per_page ;
  }else{
    $query = "SELECT * FROM post WHERE  (category = 'seed')   LIMIT  ".$page_first_result. ','.$result_per_page ;
  }
  $result = mysqli_query($conn,$query);
 

if(mysqli_num_rows($result)>0){
 
    while($row  = mysqli_fetch_array($result)){
    $count = $count+1;
    // if($count==4){
    //   echo "hi";
?>




<div class = "column_2" >
<form method  = "Post " action  =  "../shopping_cart/cart.view.php" >  
                <div class = "cards" >
                    <div class = "card_body">

                    <img src="../images/<?php echo $row["image"];?>" width = "180" height="150">
                    <div class="detail"> 
                    <h5 class= "text_info">Name:<?php echo $row['item_name'];?></h5>
                    <h5>Location:<?=$row['district'];?></h5>
                    <h5>Quantity : <?php echo $row['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $row['unit_price'];?> .00</h5> 
                   </div>
                <?php $id =$row["post_id"] ;?>
                  <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                  <input type= "submit" name= "add" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                  
                  <input type= "submit" name= "wishlist" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>

                  </div>
                </div>
             </form> 
       
  </div> 






<?php
 
  }
  }else{
  ?>

  <h3> Item not found .. </h3>

<?php
  }
?>
 

  </div>
</div>


<div class  = "pagination">
  <?php


if($page>= 2 ){
  echo "<a class  =  'prev' href='seed.php?page=".($page-1)."'> Previous page </a>";
}else{
  echo "<a class  =  'prev' href='seed.php?page=".($page)."'> Previous page </a>";
}


for($i = 1; $i<= $number_of_page; $i++){
  if($i== $page){
  $pagLink= "<a class ='active' href='seed.php?page=".$i."'>$i</a>";
  echo $pagLink;
  }else{
  $pagLink= "<a class = 'normal' href='seed.php?page=".$i."'>$i</a>";
  echo $pagLink;
  }

};



if($page < $number_of_page){
   echo "<a class  =  'next' href ='seed.php?page=".($page+1)."'> Next page </a>";   

}else{

echo "<a class  =  'next' href ='seed.php?page=".($page)."'> Next page </a>"; 
}

?>

</div>

</head>
<div class  = "footer">
<img src = "../images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</div>
</body>
</html>
