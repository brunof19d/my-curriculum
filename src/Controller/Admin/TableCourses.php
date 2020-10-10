<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableCourses implements RequestHandlerInterface
{
    use RenderHtml;
    private PdoCourseRepository $repository;

    public function __construct()
    {
        $this->repository = new PdoCourseRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/section/table-courses.php', [
            'title'             => 'Table courses',
            'queryCourses'      => $this->repository->allCourses(),
            'queryInstitution'  => $this->repository->allInstitution(),
            'queryCategory'     => $this->repository->allCategories(),
            'highlightLimit'    => $this->repository->queryCountHighlightLimit()
        ]);
        return new Response(200, [], $html);
    }
}