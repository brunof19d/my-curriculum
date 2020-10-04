<?php


namespace App\Controller;

use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoEducationRepository;
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

    public function __construct()
    {
        $this->repositorySkill = new PdoSkillRepository();
        $this->repositoryEducation = new PdoEducationRepository();
        $this->repositoryPersonal = new PdoPersonalDataRepository();
        $this->repositoryWork = new PdoWorkRepository();
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
            'queryDatabase'     => $this->repositorySkill->queryCategory(3)     // ID (3) = DATABASE
        ]);
        return new Response(200, [], $html);
    }
}