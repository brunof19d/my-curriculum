<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoSkillRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditSkills implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $repository = new PdoSkillRepository();

        $html = $this->render('admin/manage-skills.php', [
            'title' => 'Manage Skills',
            'queryFrontEnd' => $repository->queryCategory(1),
            'queryBackEnd' => $repository->queryCategory(2),
            'queryDatabase' => $repository->queryCategory(3)
        ]);
        return new Response(200, [], $html);
    }
}