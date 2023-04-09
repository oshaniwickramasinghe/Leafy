
<?php
require "model.php";


   $errors =[];
    //$_Post is the data
     if (empty($_POST['fname']))
     {
       $errors['fname'] = 'A first name is required';
     }
     if (empty($_POST['lname']))
     {
       $errors['lname'] = 'A last name is required';
     }

     //checking if already existing email

     if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
     {
       $errors['email'] = 'Email is not valid';
     }else if(where(['email' =>$_POST['email']])){
         $errors['email'] = 'Email already exists';
      }
     


     if (empty($_POST['password']))
     {
       $errors['password'] = 'A password is required';
     }
     if ($_POST['password'] !== $_POST['cpassword'])
     {
       $errors['password'] = 'Passwords do not matched';
     }
    
   if(empty($errors))
   {
       return true;
   }
        return false;