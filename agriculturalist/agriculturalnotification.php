<?php 


require "../public/Auth.php";
include "../public/includes/header.view.php";
// include "database.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agrinotifi.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   
          
    <title>Agriculturalist Notification page</title>
</head>
<body>
    

    <div class="notification-row">
      <div class="notification-text">
        <p><?php echo $res[''] ?></p>
        <p><?php echo $res[''] ?></p>
        <p><?php echo $res[''] ?></p>
      </div>
      <div class="notification-buttons">
        <button class="notification-button accept">Accept</button>
        <button class="notification-button reject">Reject</button>
      </div>
    </div>
    
    <div class="notification-row">
      <div class="notification-text">
        <p>Test</p>
      </div>
      <div class="notification-buttons">
        <button class="notification-button accept">Accept</button>
        <button class="notification-button reject">Reject</button>
      </div>
    </div>

    <footer>

<img src = "photos/Footer.svg"  height= "121.3px" style =  " margin-top:15%">
</footer>
    
</body>

</html>