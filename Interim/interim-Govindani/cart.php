<?php
 session_start();
 $con = mysqli_connect("localhost" ,"root" , "" , "customer_db");

    if(isset($_SESSION["shopping_cart"])){
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
        }
       }else{
        $item_array= array(
        'item_id'    => $_GET["id"],
        'item_name' =>$_POST["hidden_name"],
        'item_price'=>$_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
        );
    
         $_SESSION["shopping_cart"][0] = $item_array;
    
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

<h3>Item Selected </h3>
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
						<td></td>
					</tr>
					<?php
					}
					?>

				</table>
			</div>