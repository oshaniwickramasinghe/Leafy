<?php


class _404{
    public  function index(){
        $data['title'] = "404";
            $this->view('404', $data);
        }
}