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

    public function filterId($id): int
    {
        $validId = filter_var($id, FILTER_VALIDATE_INT);

        if (is_null($validId) || $validId == false or $validId <= 0) {
            $this->defineMessage('danger', 'ID invalid.');
            return false;
        }
        return $validId;
    }

    /**
     * Filter string receive and send message of error
     * @param string $input $_POST receive
     * @param string $message Message for error
     * @return string
     */
    public function filterString(string $input, string $message): string
    {
        $validString = trim(filter_var($input, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
        if (is_null($validString) || $validString == false) {
            $this->defineMessage('danger', $message);
        }
        return $validString;
    }

    public function filterDate(string $date): string
    {
        // Format for Database yyyy/mm/dd
        $defaultDate = '/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/';
        $resultDate = preg_match($defaultDate, $date);

        if (!$resultDate) {
            $this->defineMessage('danger', 'Date invalid.');
            return false;
        }
        return $resultDate;
    }

    /**
     * Check  the file in the upload has the correct extension for the site and changes the name for security to save in the database with the function uniqid().
     * This function does not generate cryptographically secure values, and should not be used for cryptographic purposes.
     * @param array $info It receives an array of the file with its information.
     * @return string
     */
    public function verifyImage(array $info): string
    {
        $extensionPermission = ['png', 'jpg', 'jpeg']; // Put all allowed extensions in an Array.
        $extension = strtolower(pathinfo($info['name'], PATHINFO_EXTENSION)); // Put the string in Lowercase, access the file information and return its extension.
        // Check if extension is compatible.
        if (!in_array($extension, $extensionPermission)) {
            $this->defineMessage('danger', 'File with incompatible extension');
            return false;
        }
        return uniqid('', true) . ".$extension"; // Put a new name on the photo for security.
    }

    /**
     * Make upload image
     * @param array $file It receives an array of the file with its information.
     * @return bool
     */
    public function uploadImage(array $file, string $nameFile): bool
    {
        $pathDirectory = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $nameFile; // Get a directory that will save the image on the server.
        $upload = move_uploaded_file($file['tmp_name'], $pathDirectory); // Moves the file to the chosen directory.
        if (!$upload) {
            $this->defineMessage('danger', 'The file upload went wrong.');
            return false;
        }
        return true;
    }
}