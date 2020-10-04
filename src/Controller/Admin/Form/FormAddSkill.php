<?php


namespace App\Controller\Admin\Form;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormAddSkill implements RequestHandlerInterface
{
    use RenderHtml;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-add-skills.php', [
            'title' => 'Add Skills',
        ]);
        return new Response(200, [], $html);
    }
}