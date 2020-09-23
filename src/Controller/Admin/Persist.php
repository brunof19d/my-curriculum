<?php


namespace App\Controller\Admin;




use App\Helper\FlashMessageTrait;

class Persist
{
    use FlashMessageTrait;

    public function filterEmail(string $email): string
    {
        $validaEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (is_null($validaEmail) || $validaEmail === false) {
            $this->defineMessage('danger', 'Email is not valid');
        }
        return $validaEmail;
    }

    public function filterPassword(string $password): string
    {
        $validaPassword = trim(filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

        if (is_null($validaPassword) || $validaPassword == false) {
            $this->defineMessage('danger', 'Password is not valid');
        }
        return $validaPassword;
    }

    public function filterId(int $id): int
    {
        $validId = filter_var($id, FILTER_VALIDATE_INT);

        if (is_null($validId) || $validId == false) {
            $this->defineMessage('danger', 'ID invalid.');
        }
        return $validId;
    }
}