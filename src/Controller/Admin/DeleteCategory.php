<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Courses\Category;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteCategory implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Category $category;
    private PdoCourseRepository $repository;
    private Persist $persist;

    public function __construct(Category $category, PdoCourseRepository $repository, Persist $persist)
    {
        $this->category = $category;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/add-course']);

        $id = $this->persist->filterId($request->getQueryParams()['id']);
        if (!$id) return $redirectLogin;
        $this->category->setCategoryId($id);

        $verifyUsed = $this->repository->verifyRowCategory($this->category);

        if ($verifyUsed !== FALSE ) {
            $this->defineMessage('danger', 'You cannot delete this category because it has a course record');
            return $redirectLogin;
        }

        $this->repository->deleteCategory($this->category);

        $this->defineMessage('success', 'Course category removed with success');

        return $redirectLogin;
    }
}