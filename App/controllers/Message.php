<?php

//one php file only can have one function
// but if we use class we can have several functions

class Message extends Controller{
    
   public  function index(){

 
     
    $data['title'] = "message";
        $this->view('message', $data);
    }

  
}