<?php


namespace App\Helper;


trait FlashMessageTrait
{
    /**
     * Define message for the show users.
     * @param string $class Class bootstrap choice, see more in https://getbootstrap.com/docs/4.0/components/alerts/.
     * @param string $message Message to show.
     */
    public function defineMessage(string $class, string $message): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['class_bootstrap'] = $class;
    }
}