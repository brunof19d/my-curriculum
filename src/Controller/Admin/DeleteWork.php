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
    private Persist $persist;

    public function __construct()
    {
        $this->work = new Work();
        $this->repository = new PdoWorkRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/admin']);

        $id = $_GET['id'];
        $filter = $this->persist->filterId($id);
        if ($filter == FALSE) {
            return $redirectLogin;
        }

        $this->work->setId($id);
        $this->repository->remove($this->work);
        $this->defineMessage('success', 'Data remove with success');
        return $redirectLogin;
    }
}