<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin\Form;

use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormAddCourse implements RequestHandlerInterface
{
    use RenderHtml;

    private PdoCourseRepository $repository;

    public function __construct(PdoCourseRepository $repository)
    {
        $this->repository = $repository;
        SessionRedirect::redirect(FALSE, '/login');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-courses.php', [
            'title'             => 'Add Course',
            'queryInstitution'  => $this->repository->allInstitution(),
            'queryCategory'     => $this->repository->allCategories()
        ]);

        return new Response(200, [], $html);
    }
}