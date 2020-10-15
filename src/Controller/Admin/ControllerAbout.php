<?php


namespace App\Controller\Admin;


use App\Entity\Model\About;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoAboutRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerAbout implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Persist $persist;
    private About $about;
    private PdoAboutRepository $repository;

    public function __construct()
    {
        $this->persist = new Persist();
        $this->about = new About;
        $this->repository = new PdoAboutRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $this->persist->filterId($_POST['id']);
        if (!$id) return new Response(302, ['Location' => '/form-about']);

        $text = $this->persist->filterString($_POST['text'], 'Field invalid');
        if (!$text) return new Response(302, ['Location' => '/form-about']);

        $this->about->setId($id);
        $this->about->setText($text);
        $this->repository->update($this->about);
        $this->defineMessage('success', 'Saved with success');
        return new Response(200, ['Location' => '/form-about']);
    }
}