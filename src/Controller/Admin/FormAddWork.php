<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormAddWork implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-work.php', [
            'title' => 'Add Work Experience',
            'button' => 'Create',
            'action' => '/add-work'
        ]);
        return new Response(200, [], $html);
    }
}