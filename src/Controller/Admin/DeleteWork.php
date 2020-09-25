<?php


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

    public function __construct()
    {
        $this->work = new Work();
        $this->repository = new PdoWorkRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/admin']);
        $id = $_GET['id'];

        $this->work->setId($id);
        $this->repository->remove($this->work);
        $this->defineMessage('success', 'Admin is remove with success.');
        return $redirectLogin;
    }
}