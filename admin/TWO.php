<?php 

//require "connect.php";
require "../public/Auth.php";
include "../public/includes/header.view.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />                                                   

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<body>
   

    <?php include "../public/includes/admin_menu.view.php"?>

    <div class = "loggedhome_body">

    <div class = "home_body">

        <ul>
            <li><?php include "../admin/charts/users.php"?> </li>               
            <li><?php include "../admin/charts/user.php"?>  </li>   
        </ul>
    </div>

    
    </div>

<?php include '../public/includes/footer.view.php'?>