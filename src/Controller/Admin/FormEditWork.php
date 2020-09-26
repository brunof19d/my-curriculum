<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditWork implements RequestHandlerInterface
{
    use RenderHtml;
    private PdoWorkRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->persist = new Persist();
        $this->repository = new PdoWorkRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $this->persist->filterId($_GET['edit']);
        if ( $id == FALSE) {
            return new Response(302, ['Location' => '/admin']);
        }

        $html = $this->render('admin/form-work.php', [
            'title' => 'Edit Work Experience',
            'button' => 'Save',
            'action' => '/make-edit-work',
            'row' => $this->repository->searchWorkExperience($id)
        ]);
        return new Response(200, [], $html);
    }

}