<?php

//one php file only can have one function
// but if we use class we can have several functions

class Cart extends Controller{
    
   public  function index(){

 
     
    $data['title'] = "cart";
        $this->view('cart', $data);
    }

  
}