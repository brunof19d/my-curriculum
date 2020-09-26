<?php


namespace App\Controller\Admin;


use App\Entity\Model\Work;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddWork implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Work $work;
    private PdoWorkRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->work = new Work();
        $this->repository = new PdoWorkRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // Redirect Form Edit ID
        $redirectPage = new Response(302, ['Location' => '/add-work-page']);

        // Check Title
        $title_job = $this->persist->filterString($_POST['title_job'], 'Your job title field is empty');
        if ($title_job == FALSE) {
            return $redirectPage;
        }

        // Check Date Begin
        $date_begin = $_POST['date_begin'];
        $resultFilter = $this->persist->filterString($date_begin, 'Date field incorrect');
        if ($resultFilter == FALSE ) {
            return $redirectPage;
        }
        $resultFilter = $this->persist->filterDate($date_begin);
        if ( $resultFilter == FALSE ) {
            return $redirectPage;
        }

        // Check Date Begin
        $date_end = $_POST['date_end'];
        $resultFilter = $this->persist->filterString($date_end, 'Date field incorrect');
        if ($resultFilter == FALSE ) {
            return $redirectPage;
        }
        $resultFilter = $this->persist->filterDate($date_end);
        if ( $resultFilter == FALSE ) {
            return $redirectPage;
        }

        // Check Current Job
        if (array_key_exists('current', $_POST)) {
            $current = 1;
        } else {
            $current = 0;
        }

        // Check Description
        $description = $this->persist->filterString($_POST['description'], 'Your job description field is empty');
        if ($description == FALSE) {
            return $redirectPage;
        }

        // Setters
        $this->work->setTitleJob($title_job);
        $this->work->setDataBegin($date_begin);
        $this->work->setDataEnd($date_end);
        $this->work->setCurrent($current);
        $this->work->setDescription($description);

        $this->repository->save($this->work);
        $this->defineMessage('success', 'Work experience added with success');
        return new Response(302, ['Location' => '/admin']);
    }
}