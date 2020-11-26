<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Education;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoEducationRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerEducation implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Education $education;
    private PdoEducationRepository $repository;
    private Persist $persist;

    public function __construct(Education $education, PdoEducationRepository $repository, Persist $persist)
    {
        $this->education = $education;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getParsedBody()['id'];
        if ($id > 0) {
            $pageRedirect = new Response(302, ['Location' => "/edit-education?id=$id"]);
        } else {
            $pageRedirect = new Response(302, ['Location' => '/add-education']);
        }

        // Check Collage Name
        $collegeName = $this->persist->filterString($_POST['college_name'], 'Field invalid.');
        if (!$collegeName) return $pageRedirect;

        // Check Date Begin
        $dataBegin = $_POST['date_begin'];
        $resultFilter = $this->persist->filterString($dataBegin, 'Field Date Begin invalid');
        if (!$resultFilter) return $pageRedirect;

        $resultFilter = $this->persist->filterDate($dataBegin);
        if (!$resultFilter) return $pageRedirect;

        // Check Date End
        $dataEnd = $_POST['date_end'];
        $resultFilter = $this->persist->filterString($dataEnd, 'Field Date End invalid');
        if (!$resultFilter) return $pageRedirect;

        $resultFilter = $this->persist->filterDate($dataEnd);
        if (!$resultFilter) return $pageRedirect;

        // Type of Degree
        $degree = $this->persist->filterString($_POST['degree'], 'Field Degree invalid');
        if (!$degree) return $pageRedirect;

        // Setters
        $this->education->setCollegeName($collegeName);
        $this->education->setDataBegin($dataBegin);
        $this->education->setDataEnd($dataEnd);
        $this->education->setDegree($degree);

        // Checks whether data will be recorded or edited.
        if (!is_null($id) && $id != false) {
            $this->education->setId($id);
            $this->defineMessage('success', 'Data education edited with success');
            $this->repository->update($this->education);

            return new Response(302, ['Location' => '/admin']);
        } else {
            $this->repository->save($this->education);
            $this->defineMessage('success', 'Data education added with success');

            return new Response(302, ['Location' => '/admin']);
        }
    }
}