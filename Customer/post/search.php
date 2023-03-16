<?php

$search = false;

if(isset($_GET['search'])){
  $find  = $_GET['search'];
  $search  = true; 
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
   
    <title>Search</title>
</head>
<body>

<div class = "search">
<form method = "get" style  = "background: none;">
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search  for and item location .."  name  = "search"/>
        <button type="submit">Search</button>
    </div>
</form>
</div>
  
</body>
</html>