<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Work;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteWork implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Work $work;
    private PdoWorkRepository $repository;
    private Persist $persist;

    public function __construct(Work $work, PdoWorkRepository $repository, Persist $persist)
    {
        $this->work = $work;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/admin']);

        $id = $this->persist->filterId($request->getQueryParams()['id']);
        if ($id == FALSE) {
            return $redirectLogin;
        }

        $this->work->setId($id);
        $this->repository->remove($this->work);
        $this->defineMessage('success', 'Data remove with success');

        return $redirectLogin;
    }
}