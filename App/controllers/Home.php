<?php

//one php file only can have one function
// but if we use class we can have several functions

class Home extends Controller{
    
   public  function index(){

 
     
    $data['title'] = "home";
        $this->view('home', $data);
    }

  
}