<?php

class App
{
    public $controller = "Home";
    public $method = "index";

    private function splitURL()
    {
        $URL = $_GET['url'] ?? "home";
        $URL = explode("/", $URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require_once($filename);
            $this->controller = ucfirst($URL[0]);
        } else {
            require_once("../app/controllers/_404.php");
            $this->controller = "_404";
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}