<?php

//authentication class

class Auth
{

    //statically create function
    public static function authentication($row)
    {
        if(is_object($row))
        {
            $_SESSION['USER_DATA'] = $row;
        }
    }

    public static function logout()
    {
        if(!empty( $_SESSION['USER_DATA'] ))
        {
           unset($_SESSION['USER_DATA']);
        
        }
    }

     // check if logged in 

     public static function  logged_in()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
             return true;
           }
           return false;
     }

//check the roles
     
     public static function  is_admin()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            $_SESSION['USER_DATA']->role == 'admin';
             return true;
           }
           return false;
     }
     public static function  is_customer()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            $_SESSION['USER_DATA']->role == 'customer';
             return true;
           }
           return false;
     }
     
     public static function  is_instructor()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            $_SESSION['USER_DATA']->role == 'instructor';
             return true;
           }
           return false;
     }
     
     public static function  is_agriculturalist()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            $_SESSION['USER_DATA']->role == 'agriculturalist';
             return true;
           }
           return false;
     }
     
     public static function  is_deliveryAgent()
     {
           if(!empty($_SESSION['USER_DATA']))
           {
            $_SESSION['USER_DATA']->role == 'Delivery Agent';
             return true;
           }
           return false;
     }

     //to show the name or the profile in header
     //if there is no function that is being call this function is called
     
     public  static function  __callStatic($funcname,$arg)
     {
        $str = str_replace("get" , "",strtolower($funcname));
        if(!empty($_SESSION['USER_DATA']->$str))
        {
             return $_SESSION['USER_DATA']->$str;

        }

           return '';
     }
     

}

 
