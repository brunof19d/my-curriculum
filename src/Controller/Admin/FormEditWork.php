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

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $_GET['edit'];
        $repository = new PdoWorkRepository();

        $html = $this->render('admin/form-work.php', [
            'title' => 'Edit Work Experience',
            'button' => 'Save',
            'action' => '/make-edit-work',
            'row' => $repository->searchWorkExperience($id)
        ]);
        return new Response(200, [], $html);
    }

}