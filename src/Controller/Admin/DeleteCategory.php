<?php


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

    public function __construct()
    {
        $this->category = new Category();
        $this->repository = new PdoCourseRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/add-course']);
        $id = $_GET['id'];
        $filter = $this->persist->filterId($id);
        if (!$filter) return $redirectLogin;
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