<?php

class _404
{
    use Controller;
    
    public function index()
    {
        echo "Error 404: controller page not found<br>";
        $this->view('404');
    }
}