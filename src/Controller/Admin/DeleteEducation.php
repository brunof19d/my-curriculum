<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Education;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoEducationRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteEducation implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Education $education;
    private PdoEducationRepository $repository;
    private Persist $persist;

    public function __construct(Education $education, PdoEducationRepository $repository, Persist $persist)
    {
        $this->education = $education;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/admin']);

        $id = $this->persist->filterId($request->getQueryParams()['id']);
        if (!$id) return $redirectLogin;

        $this->education->setId($id);
        $this->repository->remove($this->education);

        $this->defineMessage('success', 'Data education remove with success');

        return $redirectLogin;
    }
}