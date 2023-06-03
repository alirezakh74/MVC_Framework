<?php

class Home extends Controller
{
    public function index()
    {
        $user = new User;
        $user->insert(['first_name' => 'Ali', 'last_name' => 'Rezaie', 'age' => 30]);
        echo "this is index of home page<br>";
        $this->view('home');
    }
}