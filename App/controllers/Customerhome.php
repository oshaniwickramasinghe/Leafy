<?php

//one php file only can have one function
// but if we use class we can have several functions

class Customerhome extends Controller{
    
   public  function index(){

 
     
    $data['title'] = "customerhome";
        $this->view('customerhome', $data);
    }

  
}