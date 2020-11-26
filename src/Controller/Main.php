<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller;

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

class Main implements RequestHandlerInterface
{
    use RenderHtml;

    private PdoSkillRepository $repositorySkill;
    private PdoEducationRepository $repositoryEducation;
    private PdoPersonalDataRepository $repositoryPersonal;
    private PdoWorkRepository $repositoryWork;
    private PdoLanguageRepository $repositoryLanguage;
    private PdoCourseRepository $repositoryCourse;

    public function __construct(PdoSkillRepository $repositorySkill,
                                PdoEducationRepository $repositoryEducation,
                                PdoPersonalDataRepository $repositoryPersonal,
                                PdoWorkRepository $repositoryWork,
                                PdoLanguageRepository $repositoryLanguage,
                                PdoCourseRepository $repositoryCourse)
    {
        $this->repositorySkill = $repositorySkill;
        $this->repositoryEducation = $repositoryEducation;
        $this->repositoryPersonal = $repositoryPersonal;
        $this->repositoryWork = $repositoryWork;
        $this->repositoryLanguage = $repositoryLanguage;
        $this->repositoryCourse = $repositoryCourse;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('home/index.php', [
            'title'             => 'Home',
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