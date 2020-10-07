<?php


namespace App\Controller\Admin\Form;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormAddCourse implements RequestHandlerInterface
{
    use RenderHtml;

    private PdoCourseRepository $repository;

    public function __construct()
    {
        $this->repository = new PdoCourseRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-courses.php', [
            'title' => 'Add Course',
            'queryInstitution' => $this->repository->allInstitution(),
            'queryCategory' => $this->repository->allCategories()
        ]);
        return new Response(200, [], $html);
    }
}