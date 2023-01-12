<?php

//one php file only can have one function
// but if we use class we can have several functions

class Login extends Controller{
    
   public  function index(){

 
    $data['errors'] = [];

    $data['title'] = "login";
    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        //validate

//check for th email

            $row = $user->first(array(
            'email' =>$_POST['email']));
        
        if($row)
           {
            
               if(password_verify($_POST['password'],$row->password ))
               {
                 //authenticate
                 //
                 Auth::authentication($row);
                 redirect('customerhome');

               }
           }
           $data['errors']['email'] = "Wrong email or password";
    
}
        $this->view('login', $data);
    }
  
  
}
