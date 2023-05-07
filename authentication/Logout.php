<?php
//include "Auth.php";
require "../public/Auth.php";


      logout();
      header("Location:Login.view.php");
      unset($_SESSION['USER_DATA']);
        
    

