<?php

$servername="localhost";
$username="student";
$password="student"; 
$database="interim";

//create connection
$conn=mysqli_connect($servername, $username, $password, $database);

//check connection
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "hi";
}




?>