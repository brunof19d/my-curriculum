<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Admin;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoAdminRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteAdmin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Persist $persist;
    private PdoAdminRepository $repository;
    private Admin $admin;

    public function __construct(Persist $persist, PdoAdminRepository $repository, Admin $admin)
    {
        $this->persist = $persist;
        $this->repository = $repository;
        $this->admin = $admin;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/register']);

        $id = $this->persist->filterId($request->getQueryParams()['id']);
        if ($id == false) {
            return $redirectLogin;
        }

        $this->admin->setId($id);
        $this->repository->remove($this->admin);

        $this->defineMessage('success', 'Admin is remove with success.');

        return $redirectLogin;
    }
}