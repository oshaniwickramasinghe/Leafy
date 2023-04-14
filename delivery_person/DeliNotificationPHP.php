<?php
    error_reporting(0);

    include 'connect.php';
?>
<?php   

  if(isset($_GET['deleteID']))
  {
     
      $order_id = $_GET['deleteID'];
      echo $order_id;
      $sql2 = "UPDATE accepted_orders SET status=2,order_viewed = 1 WHERE order_id=$order_id AND sent_deli_id=3";
      $result2=mysqli_query($conn,$sql2);

      header("Location:/Leafy/delivery_person/DeliNotification.php");
      exit;

  }


  if(isset($_GET['acceptID']))
  {

      $order_id = $_GET['acceptID'];
      $sql2 = "UPDATE accepted_orders SET status=1,order_viewed = 1 WHERE order_id=$order_id AND sent_deli_id=3";
      $result2=mysqli_query($conn,$sql2);

      $sql3 = "UPDATE checkout SET delivery_status=1 WHERE orderid=$order_id ";
      //UPDATE `checkout` SET `delivery_status`=1 WHERE 'orderId'=$order_id
      $result3=mysqli_query($conn,$sql3);

      header("Location:/Leafy/delivery_person/DeliNotification.php");
      exit;

  }

?>


<?php
//update viewed order notifications
    if(isset($_GET['readID']))
    {
        $orderid = $_GET['readID'];
        $update_query = "UPDATE accepted_orders SET order_viewed = 1 WHERE order_id =$orderid AND sent_deli_id=3";
        mysqli_query($conn, $update_query);

        header("Location:/Leafy/delivery_person/DeliNotification.php");
        exit;
    }
?>


<?php



//not delivered orders
//$sqlorder0="SELECT * FROM deals,accepted_orders WHERE deals.order_status=0 AND accepted_orders.sent_deli_id=$deli_id";
//$sqlorder0="SELECT * FROM accepted_orders WHERE status=0 AND sent_deli_id=3 AND order_viewed=0";
$sqlorder0="SELECT *
            FROM accepted_orders AS ao
            JOIN checkout AS co ON ao.order_id = co.orderid
            JOIN deals AS d ON co.orderid = d.order_id
            WHERE ao.sent_deli_id = 3
            AND ao.order_viewed = 0
            AND co.delivery_status = 0";

// make query & get resultorder0
$resultorder0= mysqli_query($conn,$sqlorder0);

    if(isset($_GET['orderid']))
    {
        $orderid = $_GET['orderid'];
        $sql1 = "SELECT * FROM deals WHERE order_id=$orderid and order_status=0";
        $result1=mysqli_query($conn,$sql1);
        
        if($result1)
        { 
            while($recordorder0 = mysqli_fetch_assoc($result1))
            {
                
                $orderid=$recordorder0['order_id'];
                $customer_id=$recordorder0['customer_id'];
                $payment_method=$recordorder0['payment_method'];
                $agriculturalist_id=$recordorder0['agriculturalist_id'];
   
            }

        }
    }

//viewed orders
$sqlorder1="SELECT * FROM accepted_orders WHERE sent_deli_id=3 AND order_viewed=1";

// make query & get resultcustomer
$resultorder1= mysqli_query($conn,$sqlorder1);

    if(isset($_GET['viewedorder']))
    {
        $VWorderid = $_GET['viewedorder'];
        $sql2 = "SELECT * FROM deals WHERE order_id=$VWorderid and order_status=0";
        $result2=mysqli_query($conn,$sql2);

        $sql3 = "SELECT status FROM accepted_orders WHERE order_id=$VWorderid and sent_deli_id=3";
        $result3=mysqli_query($conn,$sql3);

        if($result2)
        { 
                       
            while($recordorder1 = mysqli_fetch_assoc($result2))
            {
                $VWorderid=$recordorder1['order_id'];
                $VWcustomer_id=$recordorder1['customer_id'];
                $VWpayment_method=$recordorder1['payment_method'];
                $VWagriculturalist_id=$recordorder1['agriculturalist_id'];
   
            }
            
        }
        if($result3)
        { 
                       
            while($recordorder2 = mysqli_fetch_assoc($result3))
            {
                $VWstatus=$recordorder2['status'];
   
            }
            
        }
    }

?> 