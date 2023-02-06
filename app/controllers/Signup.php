<?php

class Homee extends Controller
{
    public function index()
    {
        $data['title'] = "Signup";
        $this->view('signup',$data);
    }
 
}