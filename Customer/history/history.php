<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/delivery.css">

<?php
include "../database/database.php";
include "../login/Auth.php";
include '../includes/header.php';

    // Retrieve the start and end dates from the query parameters
    if(isset($_GET['filter'])){
      $start_date = $_GET['start_date'];
      $end_date = $_GET['end_date'];
        }else{
          $start_date = date("Y-m-d");
          $end_date= date("Y-m-d");
        }
    
 $uid  =  $_SESSION['USER_DATA']['user_id'];
 if(!isset($user_ID)){
  header('location:/leafy-main/customer/login/login.view.php');
}; 

    
    // Perform filtering based on the dates
    // Assuming we have a table called 'items' with a 'date' column
    ?>
    
    <!DOCTYPE html>
<html>
<head>
  <title>History</title>
</head>
<body>
  
 

    <div class="history_body">
 <form class  =  "history">
    <h2><i class="fa fa-cart-plus" aria-hidden="true"></i> Order History </h2> 
    <div class="filter">
<form action="history.php" method="GET" class="form-inline">
  <div class="history_filter">
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date">

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date">
        <button type  = "submit"  name  = "filter">Filter</button>
        
      </div>
    </form>
  </div>

    <table>
  
    <tr>
  
   <th width="10%">Item name</th>
   <th width="10%">Date</th>
   <th width="12%">Payment Method</th>
   <th width="12%">Delivery Method</th>
   <th width="10%">Quantity</th>
   <th width="10%">Total</th>
   <th width="10%">Agriculturalist</th>

    </tr>

    <?php

  // get order history of the customer from the database
  $sql = "SELECT * FROM deals WHERE (Date >= '$start_date' AND Date <= '$end_date')AND customer_id =  $uid";
    $result = mysqli_query($conn , $sql);
   
    while($res = mysqli_fetch_array($result )){
        if($res['delivery'] ==1){
            $del  = "Delivery";
        }else{
            $del  = "Pick Up";
        }
        
        $agriculturalist = $res['agriculturalist_id'];
        $query  = "SELECT fname ,lname FROM user WHERE user_id=$agriculturalist";
        $r = mysqli_query($conn ,   $query);
        while($row = mysqli_fetch_array($r)){


        ?>
        <tr>

   <!-- Table data -->
    <td><?=$res['item_name']?></td>
    <td><?=$res['Date']?></td>
    <td><?=$res['payment_method']?></td>
    <td><?=$del ?></td>
    <td><?=$res['quantity']?> kg</td>
    <td>Rs <?=$res['total_cost']?>.00</td>
    <td><?=$row['fname'];?> &nbsp <?= $row['lname']?> </td>
     </tr>
   <?php

 //closing the php part  retrieve of database
  }
    }
?>

</table><br>
 </form>
 <div class  = "backk">
<a href  = "../customerhome.php" ><input type  = "submit" name  =  "back" value  =  "Back" ></a>
</div>


</div>
   <!-- footer -->
<div class="footer">
<?php include "../includes/footer.php"; ?>
</div>



    
    
</body>
</html>
