<?php

function show($stuff)
{
    echo "<pre>";
    print_r ($stuff);
    echo "</pre>";

}

function set_value($key)
{
  if(!empty($_POST))
  {
    return $_POST[$key];
  }
   
  return false;
}


function redirect()
{
 
   header("Location: " . ROOT."/".$link);
   die;

}
