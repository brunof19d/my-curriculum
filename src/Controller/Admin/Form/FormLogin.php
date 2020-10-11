<?php


namespace App\Controller\Admin\Form;


use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormLogin implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        SessionRedirect::redirect(TRUE, '/admin');

        $html = $this->render('admin/form-login-register.php', [
            'title' => 'Login Admin',
            'attributeInput' => 'login',
            'button' => 'Login',
            'action' => '/controller-admin'
        ]);
        return new Response(200, [], $html);
    }
}