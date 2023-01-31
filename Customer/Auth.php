<?php
session_start();
//authentication class


    //statically create function
    function logout()
    {
        if(!empty( $_SESSION['USER_DATA'] ))
        {
            unset($_SESSION['cart']);
           unset($_SESSION['USER_DATA']);

        }
    }

     // check if logged in 

    function logged_in()
     {
           if(!empty($_SESSION['USER_DATA']))
           {

             return true;
           }
           return false;
     }

//check the roles

      function  is_admin()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
           if( $_SESSION['USER_DATA']['role'] == 'admin'){
            return true;
           }else{

             return false;
           }
           }

     }
   function  is_customer()
     {
           if(!empty($_SESSION['USER_DATA']))
           {

            if( $_SESSION['USER_DATA']['role'] == 'customer'){
            return true;
           }else{
      
             return false;
           }
     }
}  
  function  is_instructor()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            if( $_SESSION['USER_DATA']['role'] == 'Instructor'){
                  return true;
                 }else{
            
                   return false;
                 }
           }
         
     }
     
    function  is_agriculturalist()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            if( $_SESSION['USER_DATA']['role'] == 'Agriculturalist'){
                  return true;
                 }else{
            
                   return false;
                 }
           }
           
     }
     
    function  is_deliveryAgent()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            if( $_SESSION['USER_DATA']['role'] == 'Delivery Agent'){
                  return true;
                 }else{
            
                   return false;
                 }
           }
           
     }

     //to show the name or the profile in header
     //if there is no function that is being call this function is called
     
  function  getfname()
     {
   $name   = $_SESSION['USER_DATA']['fname'];

     return $name;
     }
     



 
