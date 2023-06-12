<?php

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    define('ROOT', 'http://localhost/mvc/public/');
    define("DB_USERNAME", "root");
    define("DB_PASS", "");
    define("DB_DRIVER_NAME", "mysql");
    define("DB_HOST", "localhost");
    define("DB_NAME", "my_mvc_db");

    define('DEBUG', true);
    
}
else
{
    define('ROOT', 'https://yourwebsite.com/');
    define("DB_USERNAME", "root");
    define("DB_PASS", "");
    define("DB_DRIVER_NAME", "mysql");
    define("DB_HOST", "localhost");
    define("DB_NAME", "my_mvc_db");

    define('DEBUG', true);
}

define('APP_NAME', 'MY WEBSITE');
define('APP_DESC', 'DESCRIPTION ABOUT WEBSTIE');