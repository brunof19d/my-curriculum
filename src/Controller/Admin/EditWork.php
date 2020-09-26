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
    private Persist $persist;

    public function __construct()
    {
        $this->work = new Work();
        $this->repository = new PdoWorkRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // Check ID
        $id = $this->persist->filterId($_POST['id']);
        if ($id == FALSE) {
            return new Response(302, ['Location' => '/admin']);
        }

        // Redirect Form Edit ID
        $redirectPage = new Response(302, ['Location' => "/edit-work?edit=$id"]);

        // Check Title
        $title_job = $this->persist->filterString($_POST['title_job'], 'Your job title field is empty');
        if ($title_job == FALSE) {
            return $redirectPage;
        }
        $date_begin = $_POST['date_begin'];
        $date_end = $_POST['date_end'];

        // Check Current Job
        if (array_key_exists('current', $_POST)) {
            $current = 1;
        } else {
            $current = 0;
        }

        // Check Description
        $description = $this->persist->filterString($_POST['description'], 'Your job description field is empty');
        if ($description == FALSE) {
            return $redirectPage;
        }

        // Setters
        $this->work->setId($id);
        $this->work->setTitleJob($title_job);
        $this->work->setDataBegin($date_begin);
        $this->work->setDataEnd($date_end);
        $this->work->setCurrent($current);
        $this->work->setDescription($description);

        $this->repository->update($this->work);
        $this->defineMessage('success', 'Data edited with success');
        return new Response(302, ['Location' => '/admin']);
    }
}