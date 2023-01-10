<?php

//trigger and auto load when new function is added
//only run when there is a missing class
spl_autoload_register('myLoader');

function myLoader($class_name)
{
    require "../app/models/" .$class_name . ".php";
}
require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";
require "app.php";
