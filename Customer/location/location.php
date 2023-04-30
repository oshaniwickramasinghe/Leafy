<!-- links for CSS files -->
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/delivery.css">

<?php
require "../../Customer/database.php";
require "../Auth.php";
include '../includes/header.php';


//save location of the customer

$id  = $_SESSION['USER_DATA']['user_id'];

$sql  = "SELECT COUNT(*) FROM notification WHERE status = 0 && customer_id = $id ";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);

if (isset($_POST['save'])){

  $ad1 = $_POST['address1'];
  $ad2 = $_POST['address2'];
  $dis  = $_POST['district'];
  $sql  = "UPDATE `customer` SET `address1`='$ad1',`address2`=' $ad2 ',`district`='$dis' WHERE user_id  = $id";
  $result = mysqli_query($conn,$sql);
}

$query = "SELECT address1,address2,district FROM customer WHERE user_id  = $id";
$result = mysqli_query($conn,$query);
$r = mysqli_fetch_array($result);

$ad1 =  $r['address1'];
$ad2 =  $r['address2'];
$dis  = $r['district'];

$address = "$ad1,$ad2,$dis";
$api_key = "AIzaSyADhAqLTBZnH5b4b8FFWd7o_1lq6sDrGZY";
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $api_key;
$response = file_get_contents($url);
$result = json_decode($response, true);

//Extract the latitude and longitude values
$lat = $result['results'][0]['geometry']['location']['lat'];
$lng = $result['results'][0]['geometry']['location']['lng'];

// save the latitude and longitude of the location of customer
$sql  = "UPDATE `checkout` SET `lat`='$lat',`lon`=' $lng ' WHERE user_id  = $id ";
$result_1 = mysqli_query($conn,$sql);

?>


<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/delivery.css">
  <head>
    <title>Location</title>

  </head>
 
  <body>


  
  <div class  =  "location_body">
  <!-- menu for the location -->

        <div class="left_menu_bar">
            <div id="menu">
                <a><i class="fa-solid fa-bars"></i></a>
                <div class="image"><img src="images/badge.svg" alt=""></div>
                <h3>Leafy</h3>
            </div>
            <ul>
                <li><a href="../customerhome.php"><i class="fa-solid fa-house"  style="font-size:16px;color:black;"></i>Home</a></li>
                <li><a href="../wishlist/wishlist.php"><i class="fa fa-list" aria-hidden="true" style="font-size:16px;color:black;"></i>Wishlist</a></li>
                <li><a href="../notification/notification.php"><i  class="fa fa-bell" aria-hidden="true"style="font-size:16px;color:black;"></i>Notifications <div class  = "count"><?php echo $row[0]?></div></a></li>
                <li><a href="../forum/forum.php"><i class="fa-solid fa-comments"  style="font-size:16px;color:black;"></i>Forum</a></li>
                <li><a href="../history/history.php"><i class="fa-solid fa-gauge-high"  style="font-size:16px;color:black;"></i>History</a></li>                 
               </ul>
        </div>




<!-- right side of the grid -->

  <form  method  = "post"  action  = "../order/orderPending.php">
  <h3>Delivery Location </h3>
<input type="text" placeholder="<?=$ad1?>" name="address1"><br>
<input type="text" placeholder=" <?=$ad2?>" name="address2"><br>
<input type="text" placeholder=" <?=$dis?>" name="district"><br><br>
<input type= "submit" class= "btn_1" value= "Save"  name = "save"/>
</form>
</div>



  <!-- google map -->
<h3>Your Current Location</h3>
<script>

function initMap() {
  const myLatLng ={lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "<?=$address?>",
  });
}

window.initMap = initMap;

  </script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
   <div id="map"></div>

<!--
  The `defer` attribute causes the callback to execute after the full HTML
  document has been parsed. For non-blocking uses, avoiding race conditions,
  and consistent behavior across browsers, consider loading using Promises
  with https://www.npmjs.com/package/@googlemaps/js-api-loader.
  -->
  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADhAqLTBZnH5b4b8FFWd7o_1lq6sDrGZY&callback=initMap&v=weekly"
  defer
></script>
<div class  =  "location"></div>
<div class="footer">
<img src = "../images/Footer.svg"  height= "121.3px"  style = "margin-top:auto">
</div>
  </body>




</html>
