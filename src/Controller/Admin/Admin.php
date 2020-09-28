<?php


namespace App\Controller\Admin;


use App\Helper\FlashMessageTrait;
use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoEducationRepository;
use App\Infrastructure\Repository\PdoWorkRepository;
use DateTime;
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

        $resultList = new PdoWorkRepository();
        $resultListEducation = new PdoEducationRepository();
        $html = $this->render('admin/index.php', [
            'title' => 'Admin Page',
            'query' => $resultList->allWorksExperience(),
            'queryEducation' => $resultListEducation->allEducation()
        ]);

        return new Response(200, [], $html);
    }
}