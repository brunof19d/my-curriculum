<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin\Form;

use App\Helper\RenderHtml;
use App\Helper\SessionRedirect;
use App\Infrastructure\Repository\PdoAboutRepository;
use App\Infrastructure\Repository\PdoPersonalDataRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormAbout implements RequestHandlerInterface
{
    use RenderHtml;

    private PdoPersonalDataRepository $repositoryPersonal;
    private PdoAboutRepository $repositoryAbout;

    public function __construct(PdoPersonalDataRepository $repositoryPersonal, PdoAboutRepository $repositoryAbout)
    {
        $this->repositoryPersonal = $repositoryPersonal;
        $this->repositoryAbout = $repositoryAbout;
        SessionRedirect::redirect(FALSE, '/login');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('admin/form-about.php', [
            'title'             => 'Edit About',
            'queryPersonalData' => $this->repositoryPersonal->getData(1),
            'queryAbout'        => $this->repositoryAbout->getData()
        ]);

        return new Response(200, [], $html);
    }
}