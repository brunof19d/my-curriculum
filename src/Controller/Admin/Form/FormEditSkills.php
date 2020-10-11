<?php


namespace App\Controller\Admin\Form;


use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use App\Infrastructure\Repository\PdoSkillRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditSkills implements RequestHandlerInterface
{
    use RenderHtml;
    private PdoSkillRepository $repository;

    public function __construct()
    {
        $this->repository = new PdoSkillRepository();
        SessionRedirect::redirect(FALSE, '/login');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-edit-skills.php', [
            'title'                 => 'Manage Skills',
            'queryFrontEnd'         => $this->repository->queryCategory(1), // ID (1) = FRONT END
            'queryBackEnd'          => $this->repository->queryCategory(2), // ID (2) = BACK END
            'queryDatabase'         => $this->repository->queryCategory(3), // ID (3) = DATABASE
            'queryFrameworkFront'   => $this->repository->queryCategory(4), // ID (4) = FRAMEWORK FRONT
            'queryFrameworkBack'    => $this->repository->queryCategory(5)// ID (5) = FRAMEWORK BACK
        ]);
        return new Response(200, [], $html);
    }
}