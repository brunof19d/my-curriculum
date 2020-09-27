<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
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
        $resultList = new PdoAdminRepository();

        $html = $this->render('admin/form.php', [
            'title' => 'Register Admin',
            'attributeInput' => 'register',
            'button' => 'Register',
            'action' => '/controller-admin',
            'query' => $resultList->allUsers()
        ]);
        return new Response(200, [], $html);
    }
}