<?php

require "config.php";

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


if(!$conn){
    echo"connection failed";
}

?>