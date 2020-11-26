<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin\Form;

use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormAddWork implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        SessionRedirect::redirect(FALSE, '/login');

        $html = $this->render('admin/form-work.php', [
            'title' => 'Add Work Experience',
            'button' => 'Create'
        ]);

        return new Response(200, [], $html);
    }
}