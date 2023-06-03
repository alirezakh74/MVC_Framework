<?php

spl_autoload_register(function($class_name){
    $filename = "../app/models/".ucfirst($class_name).".php";
    require_once($filename);
});

require_once("config.php");
require_once("functions.php");
require_once("Database.php");
require_once("Model.php");
require_once("Controller.php");

require_once("App.php");