<?php


namespace App\Controller\Admin;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableFilterCategory implements RequestHandlerInterface
{
    use RenderHtml;
    private PdoCourseRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->repository = new PdoCourseRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $category = $this->persist->filterId($_POST['category']);
        if (!$category) return new Response(302, ['Location' => '/table-course']);

        $html = $this->render('admin/section/table-filter-category.php', [
            'title' => 'Table courses category',
            'queryOnlyCategory' => $this->repository->queryCoursesOnlyByCategory($category)
        ]);
        return new Response(200, [], $html);
    }
}