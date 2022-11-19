<?php
session_start();
unset($_SESSION["ID"]);
unset($_SESSION["Email"]);
session_destroy();
header("Location:index.html");

// remove all session variables
//session_unset();

// destroy the session

?>