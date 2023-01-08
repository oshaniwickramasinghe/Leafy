<?php

class App{
    protected $controller = '_404';
    protected $method = 'index';

//when instantiating a class __construct() will run automatically
    function __construct(){
         $arr = $this->getURL();
         $filename = "../app/controllers/".ucfirst($arr[0]).".php";
         if(file_exists($filename))
         {
            require $filename;
            $this->controller = $arr[0];
            unset($arr[0]);
         }else{
            require "../app/controllers/".$this->controller.".php";
         }

         $mycontroller = new $this->controller();
         $mymethod = $arr[1]??$this->method;

         if(!empty($arr[1])){

//getting to each function according to the url
//if function existing then set to default function

         if(method_exists($mycontroller,strtolower( $mymethod))){
            $this->method = strtolower( $mymethod);
            unset($arr[1]);
         }
    }
    $arr = array_values($arr);
   
         call_user_func_array([$mycontroller,$this->method], $arr);


    }

    private function  getURL(){
        $url = $_GET['url'] ?? 'home';
        //ignore space or any not needed things in url by filter_var
        $url =filter_var($url,FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;
    
    }

}