<?php
include "../Auth.php";
include "../database.php";
include '../includes/header.php';

$uid  = $_SESSION['USER_DATA']['user_id'];

$sql = "SELECT * FROM shopping_cart WHERE user_id  = $uid ";
$result   =  mysqli_query($conn , $sql);
while($row  = mysqli_fetch_array($result )){
   $id = $row['order_id'];
 

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>History</title>
</head>
<body>
<div class="history_body">
  <form class  =  "history">
    <h2><i class="fa fa-cart-plus" aria-hidden="true"></i> Order History </h2>
<table>
  
    <tr>
   <th width="10%">Order Id</th>
   <th width="10%">Date</th>
   <th width="10%">Payment Method</th>
   <th width="10%">Item name</th>
   <th width="10%">Total</th>
   <th width="10%">Action</th>
  
    </tr>
<tr>
    <?php
 
       $sql = "SELECT * FROM `order` WHERE order_id = $id ";
   
       $result   =  mysqli_query($conn , $sql);
       
     while(  $res = mysqli_fetch_array($result )){
        ?>
    <td>#00<?=$res['order_id']?></td>
    <td><?=$res['Date']?></td>
    <td><?=$res['payment_method']?></td>
    <td>Cabbage</td>
    <td>Rs <?=$row['total_cost']?>.00</td>
    <td> 
    <input type  = "button" name  =  "view" value  =  "View" onclick="showModal(); return false;" styel  = "width:15% ; margin-left:-2%"></td>
     </tr>
    <tr>
    <td>#003</td>
    <td>2023-02-06</td>
    <td>Cash</td>
    <td>Carrot</td>
    <td>Rs 2700 .00</td>
    <td> 
    <a href  = " " ><input type  = "button" name  =  "view" value  =  "View" onclick="showModal(); return false;" styel  = "width:15% ; margin-left:-2%"></a></td>
     </tr>
     <tr>
    <td>#004</td>
    <td>2023-02-08</td>
    <td>Credit</td>
    <td>Pumpkin</td>
    <td>Rs 1850 .00</td>
    <td> 
    <a href  = " " ><input type  = "button" name  =  "view" value  =  "View" onclick="showModal(); return false;" styel  = "width:15% ; margin-left:-2%"></a></td>
     </tr>
     </table>

<?php
 }
}
?>
</form>
<div class  = "backk">
<a href  = "../customerhome.php" ><input type  = "submit" name  =  "back" value  =  "Back" ></a>
</div>

<div class =  "history_form">
  
               <div id="id01" class="modal" style="display: none;">
               
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                
                  <form  method = "post"  action="/action_page.php">
                      <div class  = "model_box">
                      <img src="../images/logo.svg"  height= "120px" >
                          <h2> Order History</h2>
                           <p> Order Id    &emsp; &emsp; &emsp;&nbsp;     : #003 </p>
                           <p> Order Date  &emsp; &emsp;&nbsp;&nbsp;     :2023-02-06 </p>
                           <p> Order address &emsp;  &emsp;   : Aruppola,Kandy </p>
                           <p> Order Description &emsp;: 15 Kg of Carrots  </p>
                           <p> Total price   &emsp; &emsp; &emsp;    : Rs 2700 .00 </p>
                           <p> Payment Method  &emsp;  : Cash</p>
                           <p>Distribution Option:Delivery</p>
                           <p> Agriculturalist &emsp;  : Mr Suresh</p>
                          


                             
                    </div>  
                </form>

</div>
</div>
</div>

</body>
</html>
<script>
        function showModal() {
            document.getElementById("id01").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("id01").style.display = "none";
        }

        function deleteDetails() {

        hideModal();
        }
  </script>


<footer>
<!-- <div class="footer-copyright">
            <p>copyright @2022 Leafy All Rights Reserved</p>
        </div> -->
<img src = "../images/Footer.svg"  height= "121.3px" style = "margin-top:auto">
</footer>
</html>