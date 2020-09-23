<?php


namespace App\Controller\Admin;


use App\Entity\Model\Admin;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoAdminRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RegisterAdmin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Admin $admin;
    private PdoAdminRepository $repository;

    public function __construct()
    {
        $this->admin = new Admin();
        $this->repository = new PdoAdminRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // TODO: Implement handle() method.
    }
}