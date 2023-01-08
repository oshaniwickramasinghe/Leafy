<?php

//one php file only can have one function
// but if we use class we can have several functions

class Login extends Controller{
    
   public  function index(){

 
     
    $data['title'] = "login";
        $this->view('login', $data);
    }

  
}