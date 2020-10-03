<?php


namespace App\Controller;

use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoEducationRepository;
use App\Infrastructure\Repository\PdoSkillRepository;
use App\Infrastructure\Repository\PdoWorkRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Main implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $resultList = new PdoWorkRepository();
        $resultListEducation = new PdoEducationRepository();
        $resultListSkills = new PdoSkillRepository();

        $html = $this->render('home/index.php', [
            'title' => 'Home',
            'query' => $resultList->allWorksExperience(),
            'queryEducation' => $resultListEducation->allEducation(),
            'queryFrontEnd' => $resultListSkills->queryCategory(1),
            'queryBackEnd' => $resultListSkills->queryCategory(2),
            'queryDatabase' => $resultListSkills->queryCategory(3)
        ]);
        return new Response(200, [], $html);
    }
}