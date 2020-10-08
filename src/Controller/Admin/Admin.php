<?php


namespace App\Controller\Admin;


use App\Helper\FlashMessageTrait;
use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoCourseRepository;
use App\Infrastructure\Repository\PdoEducationRepository;
use App\Infrastructure\Repository\PdoLanguageRepository;
use App\Infrastructure\Repository\PdoPersonalDataRepository;
use App\Infrastructure\Repository\PdoSkillRepository;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Admin implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessageTrait;
    private PdoSkillRepository $repositorySkill;
    private PdoEducationRepository $repositoryEducation;
    private PdoPersonalDataRepository $repositoryPersonal;
    private PdoWorkRepository $repositoryWork;
    private PdoLanguageRepository $repositoryLanguage;
    private PdoCourseRepository $repositoryCourse;

    public function __construct()
    {
        $this->repositorySkill = new PdoSkillRepository();
        $this->repositoryEducation = new PdoEducationRepository();
        $this->repositoryPersonal = new PdoPersonalDataRepository();
        $this->repositoryWork = new PdoWorkRepository();
        $this->repositoryLanguage = new PdoLanguageRepository();
        $this->repositoryCourse = new PdoCourseRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (isset($_SESSION['logged']) == FALSE) {
            $this->defineMessage('danger', 'You need make login to access this area.');
            return new Response(302, ['Location' => '/login']);
        }

        $html = $this->render('admin/index.php', [
            'title'             => 'Admin Page',
            'queryWork'         => $this->repositoryWork->allWorksExperience(),
            'queryEducation'    => $this->repositoryEducation->allEducation(),
            'queryPersonalData' => $this->repositoryPersonal->getData(1),   // Default (1), because there will always be only one row in the personal data table.
            'queryFrontEnd'     => $this->repositorySkill->queryCategory(1),    // ID (1) = FRONT END
            'queryBackEnd'      => $this->repositorySkill->queryCategory(2),    // ID (2) = BACK END
            'queryDatabase'     => $this->repositorySkill->queryCategory(3),    // ID (3) = DATABASE
            'queryFrameFront'   => $this->repositorySkill->queryCategory(4),    // ID (4) = FRAMEWORK FRONTEND
            'queryFrameBack'    => $this->repositorySkill->queryCategory(5),     // ID (5) = FRAMEWORK BACKEND
            'queryLanguage'     => $this->repositoryLanguage->allLanguages(),
            'queryCoursesLimit' => $this->repositoryCourse->queryCoursesLimit(),
            'countRowCourse'    => $this->repositoryCourse->queryCountRowsCourses()
        ]);
        return new Response(200, [], $html);
    }
}