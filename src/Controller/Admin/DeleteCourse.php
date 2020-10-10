<?php


namespace App\Controller\Admin;


use App\Entity\Model\Courses\Course;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class DeleteCourse implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private Course $course;
    private PdoCourseRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->course = new Course();
        $this->repository = new PdoCourseRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/table-courses']);
        $id = $_GET['id'];
        $filter = $this->persist->filterId($id);
        if (!$filter) return $redirectLogin;

        $this->course->setCourseId($id);
        $this->repository->deleteCourse($this->course);
        $this->defineMessage('success', 'Course removed with success');
        return $redirectLogin;
    }
}