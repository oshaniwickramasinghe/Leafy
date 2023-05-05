<?php
include "Auth.php";


      logout();
      header("Location:home.view.php");
      unset($_SESSION['USER_DATA']);
        
    

