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
        $html = $this->render('admin/form-edit-work.php', [
            'title' => 'Edit Work Experience',
        ]);
        return new Response(200, [], $html);
    }

}