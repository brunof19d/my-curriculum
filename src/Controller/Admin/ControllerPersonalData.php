<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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

    public function __construct(PersonalData $personalData, PdoPersonalDataRepository $repository, Persist $persist)
    {
        $this->personalData = $personalData;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pageRedirect = new Response(200, ['Location' => '/edit-personal-data']);

        $id = $request->getParsedBody()['id'];

        $photo = $_FILES['photo_profile']; // Receives data from a form file.
        // Check if there is a new photo to save.
        if (!empty($photo['name'] && $photo['type'] && $photo['tmp_name'])) {
            $photoName = $this->persist->verifyImage($photo); // Handles the file.
            if (!$photoName) return $pageRedirect;

            $upload = $this->persist->uploadImage($photo, $photoName); // Make upload.
            if (!$upload) return $pageRedirect;
        } else {
            $photoName = $_POST['photo_current']; // If you don't have a new photo, take the current photo from the input hidden.
        }

        $name = $this->persist->filterString($_POST['name'], 'Field name invalid');
        if (!$name) return $pageRedirect;

        $profession = $this->persist->filterString($_POST['profession'], 'Field profession invalid');
        if (!$profession) return $pageRedirect;

        $city = $this->persist->filterString($_POST['city'], 'Field city invalid');
        if (!$city) return $pageRedirect;

        $country = $this->persist->filterString($_POST['country'], 'Field country invalid');
        if (!$country) return $pageRedirect;

        $email = $this->persist->filterEmail($_POST['email']);
        if (!$email) return $pageRedirect;

        $phone = $this->persist->filterString($_POST['phone'], 'Field phone invalid');
        if (!$phone) return $pageRedirect;

        $this->personalData->setId($id);
        $this->personalData->setImage($photoName);
        $this->personalData->setName($name);
        $this->personalData->setProfession($profession);
        $this->personalData->setCity($city);
        $this->personalData->setCountry($country);
        $this->personalData->setEmail($email);
        $this->personalData->setPhone($phone);

        $this->defineMessage('success', 'Saved with success');
        $this->repository->update($this->personalData);

        return new Response(200, ['Location' => '/admin']);
    }
}