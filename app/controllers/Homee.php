<?php

class Homee extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $this->view('homee',$data);
    }
 
}