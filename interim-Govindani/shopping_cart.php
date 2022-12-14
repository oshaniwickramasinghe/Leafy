<?php
include "hf.php";
include "db_con.php";
session_start();

if(isset($_POST["add_to_cart"])){
    
    if(($_GET["id"] ==  1 && $_POST["quantity"] > 10 )  || ($_GET["id"] ==  2 && $_POST["quantity"] > 20 )  ){
        echo "<script>alert('Quantity must be less than or equal to available quantity')</script>";
       }else{
        $id = $_GET['id'];
         $name = $_POST["hidden_name"];
         $quantity =$_REQUEST["quantity"];
         $price = $_POST["hidden_price"];
         $total =  $quantity*$price;
         $sum =  $total+$price;
         $query="SELECT * FROM shopping_cart where name='$name'";

         $row=mysqli_query($conn, $query);
 
         if(mysqli_num_rows($row)>0)
         {
            echo "<script>alert('Item Already Exists')
            document.location.href ='shopping_cart.php';
            </script>";
           

         }
         else
         {
         $query = "INSERT INTO shopping_cart(name,quantity,price,total) VALUES ('$name',' $quantity','$price','$total')";
         $results = mysqli_query($conn,$query);
         if( $_GET['id']==1){
            $qun = 10 -$quantity;
         $sql = "UPDATE `items` SET `quantity` = '$qun' WHERE `items`.`id` = '1'";
         
         $up = mysqli_query($conn, $sql);
         }else if($_GET['id']==2){
            $qun = 20 -$quantity;
            $sql = "UPDATE `items` SET `quantity` = '$qun' WHERE `items`.`id` = '2'";
            $up = mysqli_query($conn, $sql);
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
    
          $result = mysqli_query($conn,$query);
          
          if(mysqli_num_rows($result)>0){
        
             while($row = mysqli_fetch_array($result)){
                ?>
              <div class = "column">
                <div class = "cards">
                    <div class = "card_body">

                    <form method = "post" action  = "shopping_cart.php?id=<?php echo $row['id']?>">
                    <img src="Images\<?php echo $row["image"];?>" width = "180" height="150">
                    <h5 class= "text_info">Name:<?php echo $row['name'];?></h5>
                    <h5>Location:<?=$row['location'];?></h5>
                    <h5>Quantity : <?php echo $row['quantity']?>kg </h5>
                    <h5 class = "text_danger">Price: Rs <?php echo $row['price'];?> /kg</h5>
                    <?php $num = $row['quantity'] ?>
                    <input type = "number" name = "quantity" id = "number" class = "form-control" value = "5" min = '5'  size = '4'>
                   
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
  $query = "SELECT * FROM shopping_cart ORDER BY id ASC";
  //execute mysql query and store data in result
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)>0){
    // while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){   
    while($rows = mysqli_fetch_assoc($result)){
       ?>


<tr>
						<td> <?php  echo $rows["name"]; ?></td>
						<td> <?php   echo $rows["quantity"]; ?></td>
            
						<td> Rs <?php  echo $rows["price"]; ?></td>
						<td> Rs <?php echo $rows["total"];?></td>
                        
                        <td><a href="delete.php?action=delete&name=<?php echo $rows["name"]; ?>"><button  onclick="return confirm('Are you sure want to delete this item?')" class="text-danger">Remove</button></a></td>
                        
                        

 
        </tr>
<?php
}}
?>


        </table>
        </div>
        <br/>



</body>
<!-- <script>

 
  $(".remove").click(function(){
        var name = $(this).parents("tr").attr("name");


        if(confirm('Are you sure to remove this item ?'))
        {
            $.ajax({
               url: '/delete.php',
               type: 'GET',
               data: {name: name},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+name).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
 

</script> -->
<div class = "footer"> </div>

</html>