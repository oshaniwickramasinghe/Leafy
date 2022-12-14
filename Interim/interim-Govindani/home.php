<?php
include "hf.php";
session_start();

$con = mysqli_connect("localhost" , "root" , "" , "customer_db");
if(isset($_POST["add_to_cart"])){
 
 
   if(isset($_SESSION["shopping_cart"])){
    if(($_GET["id"] ==  1 && $_POST["quantity"] > 10 )  || ($_GET["id"] ==  2 && $_POST["quantity"] > 20 )  ){
    echo "<script>alert('Quantity must be less than or equal to available quantity')</script>";
   }else{
    $item_array_id = array_column($_SESSION["shopping_cart"] , "item_id");
    if(!in_array($_GET["id"] , $item_array_id)){
       $count = count($_SESSION["shopping_cart"]);

       $item_array = array(
         'item_id'    => $_GET["id"],
          'item_name' =>$_POST["hidden_name"],
          'item_price'=>$_POST["hidden_price"],
          'item_quantity' => $_POST["quantity"]
       );

          
           
          
        $_SESSION["shopping_cart"][$count] = $item_array;
    }else
    {
        echo '<script>alert("Item Already Added")</script>';
    }}
   }else{
    $item_array= array(
    'item_id'    => $_GET["id"],
    'item_name' =>$_POST["hidden_name"],
    'item_price'=>$_POST["hidden_price"],
    'item_quantity' => $_POST["quantity"]
    );

     $_SESSION["shopping_cart"][0] = $item_array;

   }

}

    if(isset($_GET["action"])){
       if($_GET["action"]== "delete"){
         foreach($_SESSION["shopping_cart"] as $keys => $values){
           if($values["item_id"] == $_GET["id"]){
             unset($_SESSION["shopping_cart"][$keys]);
             echo'<script>alert("Item Removed")</script>';
             echo'<script>window.location = "home.php"</script>';
           }
         }
       }
    }
          
      
?>


<!DOCTYPE html>
<html>
<head>
<!-- <header>

</header> -->
<title>Home</title>
</head>


<body>
<link rel = "stylesheet" href = "home.css">

    <div  class = "container">
        <h3>posts</h3>

     <div class = "row">    
        
        <?php
          $query = "SELECT * FROM items ORDER BY id ASC";
          //execute mysql query and store data in result
          $result = mysqli_query($con,$query);

          if(mysqli_num_rows($result)>0){
        
             while($row = mysqli_fetch_array($result)){
                ?>
              <div class = "column">
                <div class = "cards">
                    <div class = "card_body">

                    <form method = "post" action  = "home.php?id=<?php echo $row['id']?>">
                    <img src="Images\<?php echo $row["image"];?>" width = "180" height="150">
                    <h5 class= "text_info">Name:<?php echo $row['name'];?></h5>
                    <h5>Location:<?=$row['location'];?></h5>
                    <h5>Quantity : <?php echo $row['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $row['price'];?> /kg</h5>
                    
                    <input type = "number" name = "quantity" id = "number" class = "form-control" value = "5" min = '5' size  ="5">
                   
                    <input type = "hidden" name= "hidden_name" value = "<?php echo $row["name"];?>"/>
                    <input type = "hidden" name= "hidden_price" value = "<?php echo $row["price"];?>"/><br>

                     <input type= "submit" name= "add_to_cart" class= "btn" value= "Add to cart" data-inline = "true"/>
                     <input type= "submit" name= "add_to_wishlist" class= "btn" value= "Add to wishlist" data-inline = "true"/>

                    </form>
                    </div>
               </div>
             </div>
             <?php
             }
          }
        ?>


</div>
 </div>
</div>

<h3>Your Cart</h3>
<div class="table-responsive">
				<table class="table table-bordered" id  = "items">
					<tr>
						<th width="20%">Item Name</th>
						<th width="25%">Quantity</th>
						<th width="20%">Price</th>
						<th width="20%">Total</th>
						<th width="15%">Action</th>
					</tr>
          <?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td> <?php  echo $values["item_name"]; ?></td>
						<td> <?php   echo $values["item_quantity"]; ?></td>
            
						<td> Rs <?php  echo $values["item_price"]; ?></td>
						<td> Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
           
						<td><a href="home.php?action=delete&id=<?php echo $values["item_id"]; ?>"><button class="text-danger">Remove</button></a></td>
					</tr>
					<?php
             
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right"> Rs <?php echo number_format($total, 2); ?></td>
            <td><button class = "checkout">Check out</button></td>
						<td></td>
					</tr>
					<?php
					}
					?>

				</table>
        </div>
			</div>
	</div>
	<br/>



 </body>
 <div class = "footer"> </div>
 
</html>

