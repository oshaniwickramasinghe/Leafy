<?php

// echo "<per>";
// print_r($_SERVER);



if($_SERVER['SERVER_NAME'] == 'localhost'){
    //database config for local server
    define('DBHOST' , 'localhost');
    define('DBNAME' , 'leafy');
    define('DBUSER' , 'root');
    define('DBPASS' , '');
    define('DBDRIVER' , 'mysql');
}else{
    //database config for live server
    define('DBHOST' , 'localhost');
    define('DBNAME' , 'leafy');
    define('DBUSER' , 'root');
    define('DBPASS' , '');
    define('DBDRIVER' , 'mysql');
}