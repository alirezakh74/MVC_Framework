<?php

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    define('ROOT', 'http://localhost/mvc/public/');
    define("DB_USERNAME", "root");
    define("DB_PASS", "");
    define("DB_DRIVER_NAME", "mysql");
    define("DB_HOST", "localhost");
    define("DB_NAME", "my_mvc_db");
}
else
{

}