<?php


namespace App\Controller\Admin;


use App\Entity\Model\Courses\Category;
use App\Entity\Model\Courses\Course;
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
    private Course $course;

    public function __construct()
    {
        $this->persist = new Persist();
        $this->institution = new Institution();
        $this->category = new Category();
        $this->course = new Course();
        $this->repository = new PdoCourseRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pageRedirect = new Response(302, ['Location' => '/add-course']);

        // Course
        if (array_key_exists('register_course', $_POST)) {
            $institution = $this->persist->filterId($_POST['institution']);
            if (!$institution) return $pageRedirect;

            $category = $this->persist->filterId($_POST['category']);
            if (!$category) return $pageRedirect;

            $courseName = $this->persist->filterString($_POST['course_name'], 'Field course name invalid');
            if (!$courseName) return $pageRedirect;

            $courseDescription = nl2br(filter_var($_POST['course_description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

            $certified = $_FILES['certified_file'];
            if (!empty($certified['name'] && $certified['type'] && $certified['tmp_name'])) {
                $certifiedName = $this->persist->verifyImage($certified); // Handles the file.
                if (!$certifiedName) return $pageRedirect;

                $upload = $this->persist->uploadImage($certified, $certifiedName); // Make upload.
                if (!$upload) return $pageRedirect;
            } else {
                $certifiedName = '';
            }

            $certifiedUrl = filter_var($_POST['certified_url'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

            $verifyDoubleCertified = $this->persist->verifyDoubleCertificate($certified, $certifiedName);
            if ($verifyDoubleCertified) return $pageRedirect;

            $this->institution->setInstitutionId($institution);
            $this->category->setCategoryId($category);
            $this->course->setCourseName($courseName);
            $this->course->setCourseDescription($courseDescription);
            $this->course->setCourseCertified($certifiedName);
            $this->course->setCourseUrl($certifiedUrl);

            $this->repository->insertCourse($this->course, $this->institution, $this->category);
            $this->defineMessage('success', 'Course added with success');
            return $pageRedirect;
        }

        // Institution
        if (array_key_exists('register_institution', $_POST)) {
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