<?php


namespace App\Controller\Admin;


use App\Entity\Model\Education;
use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoEducationRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditEducation implements RequestHandlerInterface
{
    use RenderHtml;

    /**
     * @var PdoEducationRepository
     */
    private PdoEducationRepository $repository;
    /**
     * @var Education
     */
    private Education $education;
    /**
     * @var Persist
     */
    private Persist $persist;

    public function __construct()
    {
        $this->repository = new PdoEducationRepository();
        $this->education = new Education();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $this->persist->filterId($_GET['id']);
        if (!$id) return new Response(302, ['Location' => '/admin']);

        $html = $this->render('admin/form-education.php', [
            'title' => 'Edit Education',
            'button' => 'Save',
            'row' => $this->repository->searchEducation($id)
        ]);
        return new Response(200, [], $html);
    }
}