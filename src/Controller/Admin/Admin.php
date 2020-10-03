<?php


namespace App\Controller\Admin;


use App\Helper\FlashMessageTrait;
use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoEducationRepository;
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

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (isset($_SESSION['logged']) == FALSE) {
            $this->defineMessage('danger', 'You need make login to access this area.');
            return new Response(302, ['Location' => '/login']);
        }

        $result = new PdoPersonalDataRepository();
        $id = 1; // Default (1), because there will always be only one row in the personal data table.

        $resultList = new PdoWorkRepository();
        $resultListEducation = new PdoEducationRepository();
        $resultListSkills = new PdoSkillRepository();

        $html = $this->render('admin/index.php', [
            'title' => 'Admin Page',
            'query' => $resultList->allWorksExperience(),
            'queryEducation' => $resultListEducation->allEducation(),
            'row' => $result->getData($id),
            'queryFrontEnd' => $resultListSkills->queryCategory(1),
            'queryBackEnd' => $resultListSkills->queryCategory(2),
            'queryDatabase' => $resultListSkills->queryCategory(3)
        ]);

        return new Response(200, [], $html);
    }
}