<?php
require "../Auth.php";

include '../database.php';
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
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search  location.."  name  = "search" id = "live-search"/>
        <div class="result"></div>
    </div>

    <div  id = "searchresult"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
 
           $("#live-search").keyup(function(){

  //when user type any value it will store in val function and value given to input
        var input  = $(this).val();

          if(input != ""){

          }else{
            $("#searchresult").css("data");

          }

           })


        })

    </script>
</body>
</html>