<?php

class Home extends Controller
{
    public function index()
    {
        echo "this is index of home page<br>";
        $this->view('home');
    }
}