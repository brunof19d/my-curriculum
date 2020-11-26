<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper;

class SessionRedirect
{
    /**
     * Function that checks if the $ _SESSION is correct for the administrative area.
     * @param bool $valueSession Session Value TRUE or FALSE, true if the user has access to the administrative area or false if not.
     * @param string $pageRedirect Page that will redirect the user.
     * @return void
     */
    public static function redirect(bool $valueSession, string $pageRedirect): void
    {
        if (isset($_SESSION['logged']) == $valueSession) {
            header("Location: $pageRedirect");
        }
    }
}

