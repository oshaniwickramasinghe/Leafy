<?php
error_reporting(0);

require "../Auth.php";
require "cart.php";
include '../includes/header.php';

// unset($_SESSION['wishlist']);
// unset($_SESSION['cart']);

// if(isset($_POST["delete"]))
// {




  if(isset($_GET["delete"]))
  {
                  
     
            foreach($_SESSION["cart"] as $keys => $values)
            {
                 if($values["post_id"] == $_GET["delete"])
                 {
                  
                      unset($_SESSION["cart"][$keys]);
                      ?>
                       <META http-equiv="Refresh" content="5; URL=http://localhost/leafy-1/Customer/shopping_cart/cart.view.php">
                      <?php
                 }
            }
       }




if(isset($_POST['update'])){
 foreach($_SESSION['cart'] as $keys => $values)
          { 
  if($values['item_name'] == $_POST['item_name']){
   
    $_SESSION['cart'][$keys] =array( 
      'post_id'=>$_GET['post_id'],
      'item_name' =>$_POST['item_name'],
      'price'=>$_POST['price'],
       'quantity'=>$_POST['quantity'],
          
    );
    
  }

}
          }

          // $name= $_POST['item_name'];
          // $quan = $_POST['quantity'];
          // $id = $_SESSION['USER_DATA']['user_id'];
          // $sub =$_POST['quantity']*$_POST['price'];
          // $sql = "INSERT INTO shopping_cart_product_details (item_name,quantity, total, user_id) VALUES ('$name','$quan','$sub','$id')";
          // $result = mysqli_query($conn, $sql);
          // var_dump( $result );

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>

<div class  = "cart_body">


<div  class  = "grid">

<div class  = "left">
  <?php
 
    if(!empty(display())){

      $res = display();

   // getting rate values of the agriculturalist
   $agri_id  = $res['user_id'];
   $query = "SELECT MAX(rate) AS rate FROM order_rate WHERE agri_id  = $agri_id";
   $result  =mysqli_fetch_array( mysqli_query($conn,$query ));
   $rate = $result['rate'];
?>


  <div class  = "grid_1">
   <div class  = "left_1">
         <img src="../images/<?php echo $res["image"];?>" width = "280" height="280">
      </div>
      <div class  = "right_1">
      <form method="post" action="cart.view.php"> 
      <h2 class= "text_info"><?php echo $res['item_name'];?></h2><br>
                   <div class = "info">
                   <h5 class = "text_danger">Price: Rs  <?php echo $res['unit_price'];?>.00  per Kg</h5>
                   <h5>Quantity :   <?php echo $res['quantity']?>kg </h5>
                   <h5>Agriculturalist Name :   <?php echo $res['agriculturalist_name']?> </h5>
                    <h5>District:  <?=$res['district'];?></h5>
                    <h5>Address:  <?=$res['location'];?></h5>
                    <h5>Contact : 0<?php echo $res['contact_no']?></h5>
                    <p>Rate : <?php echo $rate?>.0 <i class="fa-sharp fa-solid fa-star  fa-s" style="color: #ece755;"></i></p>

                    </div> <?php $id =$res["post_id"];?>
                    <input type = "hidden" name= "item_name" value = "<?php echo $res['item_name']; ?>">
                    <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                    <input type = "hidden" name= "quantity" value = "<?php  echo $res['quantity']; ?>">
                    <input type = "hidden" name= "price" value = "<?php echo $res['unit_price']; ?>">
                    <input type = "hidden" name= "id" value = "<?php echo $res['user_id']; ?>">

                     <input type= "submit" name= "cart" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                 <input type= "submit" name= "wishlist" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>
    </form>
      </div>

  </div>
  <?php  if ($res['category'] == "Vegetable"){?>
  <div class="continue">
          <a href = "../post/vegetable.php"><input type= "submit" name= "continue" class= "btn_1" value= "<< Continue" 
          data-inline = "true"/ style = "font-size :16px; width:150px"></a>

     </div>
     <?php }?>

  <?php if ($res['category'] == "seed"){?>
 <div class="continue">
 <a href = "../post/seed.php"><input type= "submit" name= "continue" class= "btn_1" value= "<< Continue" 
 data-inline = "true"/ style = "font-size :16px; width:150px"></a>
</div>
 <?php  }?>


  </div>
<?php

}

$res = display();
?>


<div class  = "right">
  <table>
  <h3><i class="fa fa-cart-plus" aria-hidden="true"></i>  Your Cart </h3>
    <tr>
   <th width="20%">Item Name</th>
   <th width="25%">Update Quantity</th>
   <th width="20%">Quantity</th>
   <th width="20%">Price</th>
   <th width="20%">Total</th>
   <th width="15%">Action</th>
    </tr>



  <?php



     if(!empty($_SESSION['cart'])){
      
    
  

      // $sql = "INSERT INTO "
       $total = 0;
       $val = 0;
       $val =  $_SESSION['cart']['quantity'];
   
    
       foreach($_SESSION['cart'] as $keys=>$values)
       {

 
        ?>
        <tr>
<form  method  = "post" action = "">
      <td> <input type = "text" value = "<?php  echo $values["item_name"] ?>"  name  ="item_name" style = "width :100px; background-color:transparent; border-color:transparent;" readonly></td>
      <td> 
      <input type = "number"  name = "quantity" style  = "width:50px" min = "<?= $res['minimum_quantity']?>"  max  = "<?= $res['quantity']?>" step=".1">
      <button class = "update" name = "update" style  = "width:50px">Add</button>

      
    </td>

      <!-- getting the quantity input by the customer -->
         
      <td> <?php  echo $values['quantity'] ?>Kg</td>
      <td> Rs <input type = "text" value = "<?php  echo $values["price"] ?>"  name  ="price"  style = "width :65px; background-color:transparent; border-color:transparent;" readonly></td>
			<td> Rs <?php  echo $values["price"]*$values['quantity']  *1; ?></td>
      <td><a href="#" type="button" id="delete" onclick="showModal(); return false;" ><button class="text-danger" name  = "delete" id  = "delete">Remove</button></a>
    
    
    </td>  
      
      
</form>
          </tr>
         
        <?php
            $total = $total  + ($values["price"]*$values['quantity']  );
            $_SESSION['total'] =$total;
       
           

       }
       ?>
       <?php
       }
  ?>
  </table>
  <div id="id01" class="modal" style="display: none;">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content" method = "post"  action="/action_page.php">
                        <div class="container">
                            <h1>Delete this item from the cart</h1>
                            <p>Are you sure you want to delete the item?</p>
                            <div class="clearfix">
                                <a href="cart.view.php?delete=<?=$values["post_id"]; ?>" type="button" class="deletebtn" onclick="deleteDetails();">Delete</a>
                                <a href="" type="button" class="cancelbtn" onclick="hideModal();">Cancel</a>
                            </div>
                            </div>
                    </form>
                </div>
  <div class  = "check">
  <form method = "Post" action  =  "checkout.php">
  <input type= "submit" name= "checkout" class= "btn_1" value= "Check Out  Rs. <?php echo $total ?> .00" 
 data-inline = "true" style = "font-size :16px; width:200px" >
  </form>  </div>



</div>
</div>


<p>Your may like product from the same agriculturalist</p>

<div class = "row_1">
<?php
$sql = "SELECT user_id FROM post WHERE post_id = $id";
$result  = mysqli_query($conn , $sql);
$row  = mysqli_fetch_array($result);
$uid = $row['user_id'];
$sql = "SELECT * FROM post WHERE user_id = $uid && post_id != $id ";
$result  = mysqli_query($conn , $sql);
if(mysqli_num_rows($result)>0){
  while($row  = mysqli_fetch_array($result)){
?>


<div class = "column_1">
<form method  = "Post " action  =  "cart.view.php">  
                <div class = "cards_1">
                    <div class = "card_body">
                    <img src="../images/<?php echo $row["image"];?>" width = "180" height="150">
                    <div class="detail"> 
                    <h5 class= "text_info">Name:<?php echo $row['item_name'];?></h5>
                    <h5>Location:<?=$row['district'];?></h5>
                    <h5>Quantity : <?php echo $row['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $row['unit_price'];?> /kg</h5> 
                   </div>
                <?php $id =$row["post_id"]
                ;?>
                  <input type = "hidden" name= "post_id" value = "<?php echo $id; ?>">
                  <input type= "submit" name= "add" class= "btn_1" value= "Add to cart" data-inline = "true"/>
                  <input type= "submit" name= "wishlist" class= "btn_1" value= "Add to wishlist" data-inline = "true"/>

                  </div>
                </div>
             </form> 
            
  </div>
 



<?php
  }
}
?>
 </div>



      </div>

      <script>
        function showModal() {
            document.getElementById("id01").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("id01").style.display = "none";
        }

        function deleteDetails() {

         <?php if(isset($_POST["delete"]))
          {
       foreach($_SESSION["cart"] as $keys => $values)
          {
               if($values["item_name"] == $_POST["item_name"])
               {
                    unset($_SESSION["cart"][$keys]);
               }
          }
     }
?>

        hideModal();
        }
    </script>
</body>
    <footer>
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</footer>

</html>

<?php




?>
