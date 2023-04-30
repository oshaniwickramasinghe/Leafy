<?php


     $errors = [];
     $table = "user";

   $arr = [
        'fname',
        'lname',
        'email',
        'password',
        'role',
        'code',
        
    ];
    


 //validate function to be accessible from outside the class
   
 if($_SERVER['REQUEST_METHOD'] == "POST"){
   
   $errors = array();
    //$_Post is the data
     if (empty($_POST['fname']))
     {
       $errors['fname'] = 'A first name is required';
     }
     if (empty($_POST['lname']))
     {
       $errors['lname'] = 'A last name is required';
     }

     //checking if already existing email and validate it
     $email= $_POST['email'];
     $row  = "SELECT * FROM user WHERE email = '$email'";
     $result = mysqli_query($conn,$row);
     $res =  mysqli_fetch_array($result);
    

     if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
     {
       $errors['email'] = 'Email is not valid';
     }else if(empty($result)){

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


  }

  if(empty($errors))
  {
      return true;
  }
  
     return $errors;