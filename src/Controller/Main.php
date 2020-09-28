<?php


namespace App\Controller;

use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoEducationRepository;
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
        $html = $this->render('home/index.php', [
            'title' => 'Home',
            'query' => $resultList->allWorksExperience(),
            'queryEducation' => $resultListEducation->allEducation()
        ]);
        return new Response(200, [], $html);
    }
}