<?php


namespace App\Controller;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoAboutRepository;
use App\Infrastructure\Repository\PdoPersonalDataRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class About implements RequestHandlerInterface
{
    use RenderHtml;

    private PdoPersonalDataRepository $repositoryPersonal;
    private PdoAboutRepository $repositoryAbout;

    public function __construct()
    {
        $this->repositoryPersonal = new PdoPersonalDataRepository();
        $this->repositoryAbout = new PdoAboutRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('home/section/about.php', [
            'title' => 'About',
            'queryPersonalData' => $this->repositoryPersonal->getData(1),
            'queryAbout' => $this->repositoryAbout->getData()
        ]);
        return new Response(200, [], $html);
    }
}