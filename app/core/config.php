<?php

// app information
define('APP','Leafy App');


if($_SERVER ['SERVER_NAME'] == 'localhost')
{ // databse config for local server
    define('HOSTNAME','localhost');
    define('DBNAME','leafy');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
//root path
    define('ROOT', 'http://localhost/instructor/public');
}else{
    //databse confog for live server
    define('HOSTNAME','localhost');
    define('DBNAME','leafy');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');

    define('ROOT', 'http://');

}