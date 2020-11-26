<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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

    private PdoAdminRepository $repository;

    public function __construct(PdoAdminRepository $repository)
    {
        $this->repository = $repository;
        SessionRedirect::redirect(FALSE, '/login');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-login-register.php', [
            'title'             => 'Register Admin',
            'attributeInput'    => 'register',
            'button'            => 'Register',
            'action'            => '/controller-admin',
            'query'             => $this->repository->allUsers()
        ]);

        return new Response(200, [], $html);
    }
}