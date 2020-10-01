<?php


namespace App\Controller\Admin;


use App\Entity\Model\PersonalData;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoPersonalDataRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerPersonalData implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private PersonalData $personalData;
    private PdoPersonalDataRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->personalData = new PersonalData();
        $this->repository = new PdoPersonalDataRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $_POST['id'];

        $photo = $_FILES['photo_profile']; // Receives data from a form file.
        // Check if there is a new photo to save.
        if (!empty($photo['name'] && $photo['type'] && $photo['tmp_name'])) {
            $photoName = $this->persist->verifyImage($photo); // Handles the file.
            if (!$photoName) return new Response(200, ['Location' => '/edit-personal-data']);

            $upload = $this->persist->uploadImage($photo, $photoName); // Make upload.
            if (!$upload) return new Response(200, ['Location' => '/edit-personal-data']);
        } else {
            $photoName = $_POST['photo_current']; // If you don't have a new photo, take the current photo from the input hidden.
        }

        $this->personalData->setId($id);
        $this->personalData->setImage($photoName);

        $this->defineMessage('success', 'Photo successfully saved');
        $this->repository->update($this->personalData);
        return new Response(200, ['Location' => '/admin']);
    }
}