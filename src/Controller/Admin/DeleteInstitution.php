<?php


namespace App\Controller\Admin;


use App\Entity\Model\Courses\Institution;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteInstitution implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private Institution $institution;
    private PdoCourseRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->institution = new Institution();
        $this->repository = new PdoCourseRepository();
        $this->persist = new Persist();
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/add-course']);
        $id = $_GET['id'];
        $filter = $this->persist->filterId($id);
        if (!$filter) return $redirectLogin;

        $this->institution->setInstitutionId($id);

        $verifyUsed = $this->repository->verifyRowInstitution($this->institution);
        if ($verifyUsed !== FALSE ) {
            $this->defineMessage('danger', 'You cannot delete this institution because it has a course record');
            return $redirectLogin;
        }

        $this->repository->deleteInstitution($this->institution);
        $this->defineMessage('success', 'Course institution removed with success');
        return $redirectLogin;
    }
}