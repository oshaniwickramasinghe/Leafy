<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["pass"]);
session_destroy();
header("Location:index.html");

// remove all session variables
//session_unset();

// destroy the session

?>