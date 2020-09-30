<?php


namespace App\Controller\Admin;


use App\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerPersonalData implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $photoProfile = $_FILES['photo_profile']; // Receives the user's file.
        $extensionPermission = ['png', 'jpg', 'jpeg']; // Put all allowed extensions in an Array.
        $extension = strtolower ( pathinfo ( $photoProfile['name'], PATHINFO_EXTENSION ) ); // Put the string in Lowercase, Access the file information and return its extension.

        // Check if extension is compatible.
        if ( !in_array($extension, $extensionPermission) ) {
            $this->defineMessage('danger', 'File with incompatible extension');
            return new Response(302, ['Location' => '/edit-personal-data']);
        }

        // uniqid() - This function does not generate cryptographically secure values, and should not be used for cryptographic purposes.
        $newNamePhoto = uniqid('', true) . ".$extension"; // Put a new name on the photo for security.

        $pathDirectory = $_SERVER['DOCUMENT_ROOT'] . '/img/';
        $pathFile = $pathDirectory . $newNamePhoto;
        move_uploaded_file( $photoProfile['tmp_name'], $pathFile );
        $this->defineMessage('success', 'Photo successfully saved');
        return new Response(200, ['Location' => '/admin']);
    }
}