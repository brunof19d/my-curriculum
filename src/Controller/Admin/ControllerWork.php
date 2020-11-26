<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Work;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerWork implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Work $work;
    private PdoWorkRepository $repository;
    private Persist $persist;

    public function __construct(Work $work, PdoWorkRepository $repository, Persist $persist)
    {
        $this->work = $work;
        $this->repository = $repository;
        $this->persist = $persist;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // As we are on an administrative page, we will not filter the ID sent, just barring anyone from entering without being logged in.
        // Several validations here are not necessary for having restricted access access, however it avoids any user error.

        // Check with page make redirect.
        $id = $_POST['id'];
        if ($id > 0) {
            $pageRedirect = new Response(302, ['Location' => "/edit-work?edit=$id"]);
        } else {
            $pageRedirect = new Response(302, ['Location' => '/add-work-page']);
        }

        // Check Title
        $title_job = $this->persist->filterString($_POST['title_job'], 'Your job title field is empty');
        if (!$title_job) return $pageRedirect;

        // Check Company Name
        $company = $this->persist->filterString($_POST['company_name'], 'Your field company name is empty');
        if (!$company) return $pageRedirect;

        // Check Date Begin
        $date_begin = $_POST['date_begin'];
        $resultFilter = $this->persist->filterString($date_begin, 'Date field incorrect');
        if ($resultFilter == FALSE) return $pageRedirect;

        $resultFilter = $this->persist->filterDate($date_begin);
        if (!$resultFilter) return $pageRedirect;

        // Check Current Job & Data End
        if (array_key_exists('current', $_POST)) {
            $current = 1; // Default value for checked input.
            $date_end = '2000-01-01'; // Default String or change database for NULL.
        } else {
            $current = 0; // Value for checked input.
            if (array_key_exists('date_end', $_POST)) {
                $date_end = $_POST['date_end'];

                $resultFilter = $this->persist->filterString($date_end, 'Date field incorrect');
                if (!$resultFilter) return $pageRedirect;

                $resultFilter = $this->persist->filterDate($date_end);
                if (!$resultFilter) return $pageRedirect;
            }
        }

        // Check Description
        $description = $this->persist->filterString($_POST['description'], 'Your job description field is empty');
        if (!$description) return $pageRedirect;

        // Setters
        $this->work->setTitleJob($title_job);
        $this->work->setCompanyName($company);
        $this->work->setDateBegin($date_begin);
        $this->work->setDateEnd($date_end);
        $this->work->setCurrent($current);
        $this->work->setDescription($description);

        // Checks whether data will be recorded or edited.
        if (!is_null($id) && $id != false) {
            $this->work->setId($id);
            $this->defineMessage('success', 'Work experience edited with success');
            $this->repository->update($this->work);
            return new Response(302, ['Location' => '/admin']);
        } else {
            $this->repository->save($this->work);
            $this->defineMessage('success', 'Work experience added with success');
            return new Response(302, ['Location' => '/admin']);
        }
    }
}