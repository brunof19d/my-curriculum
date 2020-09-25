<?php


namespace App\Controller\Admin;


use App\Entity\Model\Work;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EditWork implements RequestHandlerInterface
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
        $id = $_POST['id'];
        $title_job = $_POST['title_job'];
        $date_begin = $_POST['date_begin'];
        $date_end = $_POST['date_end'];
        $current = $_POST['current'];
        $description = $_POST['description'];

        $this->work->setTitleJob($title_job);
        $this->work->setDataBegin($date_begin);
        $this->work->setDataEnd($date_end);
        $this->work->setCurrent($current);
        $this->work->setDescription($description);
        $this->work->setId($id);


        $this->repository->update($this->work);
        $this->defineMessage('success', 'Section data job successfully edited');
        return new Response(302, ['Location' => '/admin']);
    }
}