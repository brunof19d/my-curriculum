<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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

    public function __construct(Course $course, PdoCourseRepository $repository, Persist $persist)
    {
        $this->course = $course;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/table-courses']);

        $id = $this->persist->filterId($request->getQueryParams()['id']);
        if (!$id) return $redirectLogin;

        $this->course->setCourseId($id);
        $this->repository->deleteCourse($this->course);

        $this->defineMessage('success', 'Course removed with success');

        return $redirectLogin;
    }
}