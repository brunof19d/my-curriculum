<?php


namespace App\Controller\Admin\Form;


use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use App\Infrastructure\Repository\PdoAdminRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormRegister implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        SessionRedirect::redirect(FALSE, '/login');
        $resultList = new PdoAdminRepository();

        $html = $this->render('admin/form-login-register.php', [
            'title' => 'Register Admin',
            'attributeInput' => 'register',
            'button' => 'Register',
            'action' => '/controller-admin',
            'query' => $resultList->allUsers()
        ]);
        return new Response(200, [], $html);
    }
}