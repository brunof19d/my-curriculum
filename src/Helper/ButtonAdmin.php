<?php


namespace App\Helper;


class ButtonAdmin
{

    /**
     * Adds a button on the page with category ( Add ).
     * @param string $actionRedirect It receives a string with the action data, in which it will be redirected.
     * @return void
     */
    public static function addButton(string $actionRedirect): void
    {
        if ($_SERVER['PATH_INFO'] == '/admin') {
            echo "<a href=\"{$actionRedirect}\" class=\"btn btn-success btn-sm ml-1\">Add</a>";
        }
    }

    /**
     * Adds a button on the page with category ( Edit ).
     * @param string $actionRedirect It receives a string with the action data, in which it will be redirected.
     */
    public static function editButton(string $actionRedirect): void
    {
        if ($_SERVER['PATH_INFO'] == '/admin') {
            echo "<div class=\"d-flex justify-content-start\"><a href=\"{$actionRedirect}\" class=\"btn btn-dark btn-sm mb-2\">Edit</a></div>";
        }
    }

    /**
     * Adds a button on the page with category ( Back ).
     * @param string $actionRedirect It receives a string with the action data, in which it will be redirected.
     */
    public static function backButton(string $actionRedirect): void
    {
        if ($_SERVER['PATH_INFO'] == '/login') {
            echo "<a href=\"{$actionRedirect}\" class=\"btn btn-dark m-2\">Back</a>";
        }
    }
}