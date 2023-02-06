<?php
// main controller class
class Controller
{
    public function view($view,$data = [])
    {
        extract($data);
        
        $file = "../app/views/".$view.".view.php";
        if(file_exists($file))
        {
            require $file;
        }else
        {
            echo "Could not found view file:" .$file;
        }
    }
}