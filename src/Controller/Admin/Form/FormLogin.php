<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormLogin implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form.php', [
            'title' => 'Login Admin',
            'attributeInput' => 'login',
            'button' => 'Login',
            'action' => '/controller-admin'
        ]);
        return new Response(200, [], $html);
    }
}