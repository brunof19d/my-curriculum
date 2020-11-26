<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Courses\Course;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoCourseRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HighlightCourse implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Persist $persist;
    private PdoCourseRepository $repository;
    private Course $course;

    public function __construct(Persist $persist, PdoCourseRepository $repository, Course $course)
    {
        $this->persist = $persist;
        $this->repository = $repository;
        $this->course = $course;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pageRedirect = new Response(302, ['Location' => '/table-courses']);

        $filterId = $this->persist->filterId($_GET['id']);
        if (!$filterId) return $pageRedirect;
        $this->course->setCourseId($filterId);

        try {
            if ($_GET['active'] == 'true') {
                $this->course->setHighlight(1);

                if ( $this->repository->queryCountHighlightLimit() ) throw new Exception('Limite maximo');

            } elseif ($_GET['active'] == 'false') {
                $this->course->setHighlight(0);
            } else {
                throw new Exception('Houston, we have a problem');
            }
        } catch (Exception $e) {
            $this->defineMessage('danger', $e->getMessage());
            return $pageRedirect;
        }

        $this->repository->highlightCourse($this->course);
        $this->defineMessage('success', 'Successfully highlighted course');

        return $pageRedirect;
    }
}