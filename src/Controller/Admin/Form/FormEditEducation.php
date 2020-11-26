<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin\Form;

use App\Controller\Admin\Persist;
use App\Entity\Model\Education;
use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use App\Infrastructure\Repository\PdoEducationRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditEducation implements RequestHandlerInterface
{
    use RenderHtml;

    private PdoEducationRepository $repository;
    private Education $education;
    private Persist $persist;

    public function __construct(PdoEducationRepository $repository, Education $education, Persist $persist)
    {
        $this->repository = $repository;
        $this->education = $education;
        $this->persist = $persist;
        SessionRedirect::redirect(FALSE, '/login');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $this->persist->filterId($request->getQueryParams()['id']);

        if (!$id) {
            return new Response(302, ['Location' => '/admin']);
        }

        $html = $this->render('admin/form-education.php', [
            'title'     => 'Edit Education',
            'button'    => 'Save',
            'row'       => $this->repository->searchEducation($id)
        ]);

        return new Response(200, [], $html);
    }
}