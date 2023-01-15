<?php

//main controller class


class Controller{

//look for view file and load  it
     public function view($view, $data=[]){

        extract($data);
        
        $filename= "../app/views/".$view.".view.php";
             if(file_exists($filename)){
                 require $filename;
             }else{
                echo "Could not find view file: ".$filename;
             }
     }
}