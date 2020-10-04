<?php


namespace App\Helper;


class ButtonAdmin
{

    public static function addButton(string $actionRedirect): void
    {
        if ($_SERVER['PATH_INFO'] == '/admin') {
            echo "<a href=\"{$actionRedirect}\" class=\"btn btn-success btn-sm ml-1\">Add</a>";
        }
    }
    
    public static function editButton(string $actionRedirect): void
    {
        if ($_SERVER['PATH_INFO'] == '/admin') {
            echo "<div class=\"d-flex justify-content-start\"><a href=\"{$actionRedirect}\" class=\"btn btn-dark btn-sm mb-2\">Edit</a></div>";
        }
    }

    public static function backButton(string $actionRedirect): void
    {
        if ($_SERVER['PATH_INFO'] == '/register') {
            echo "<a href=\"{$actionRedirect}\" class=\"btn btn-dark m-2\">Back</a>";
        }
    }
}