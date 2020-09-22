<?php


namespace App\Helper;


trait FlashMessageTrait
{
    public function defineMessage(string $class, string $message): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['class_bootstrap'] = $class;
    }
}