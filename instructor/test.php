<?php
include 'config.php';
include 'header.php';


if(!isset($user_ID)){
    header('location:login.php');
};

if(isset($_GET['logout'])){
     unset($user_ID);
     session_destroy();
     header('location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>