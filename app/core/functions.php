<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc(string $str) : string
{
    return htmlspecialchars($str);
}