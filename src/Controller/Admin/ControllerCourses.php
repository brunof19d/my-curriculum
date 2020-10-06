<?php


namespace App\Controller\Admin;


use App\Entity\Model\Courses\Category;
use App\Entity\Model\Courses\Institution;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoCourseRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerCourses implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Persist $persist;

    private Category $category;

    private PdoCourseRepository $repository;

    private Institution $institution;

    public function __construct()
    {
        $this->persist = new Persist();

        $this->category = new Category();

        $this->institution = new Institution();

        $this->repository = new PdoCourseRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pageRedirect = new Response(302,['Location' => '/add-course']);

        // Institution
        if ( array_key_exists('register_institution', $_POST)) {
            $institution = $this->persist->filterString($_POST['institution_name'], 'Field institution name is invalid');
            if (!$institution) return $pageRedirect;
            $this->institution->setInstitutionName($institution);
            $this->repository->insertInstitution($this->institution);
            $this->defineMessage('success', 'Institution added with success');
            return $pageRedirect;
        }

        // Category
        if (array_key_exists('register_category', $_POST)) {
            $category = $this->persist->filterString($_POST['name_category'], 'Field category name is invalid');
            if (!$category) return $pageRedirect;
            $this->category->setCategoryName($category);
            $this->repository->insertCategory($this->category);
            $this->defineMessage('success', 'Category added with success');
            return $pageRedirect;
        }

    }
}