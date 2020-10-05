<?php


namespace App\Controller\Admin;


use App\Entity\Model\Language;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoLanguageRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteLanguage implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private Persist $persist;
    private Language $language;
    private PdoLanguageRepository $repository;

    public function __construct()
    {
        $this->persist = new Persist();
        $this->language = new Language();
        $this->repository = new PdoLanguageRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pageRedirect = new Response(302, ['Location' => '/admin']);

        $id = $this->persist->filterId($_GET['id']);
        if (!$id) return $pageRedirect;

        $this->language->setId($id);
        $this->repository->remove($this->language);
        $this->defineMessage('success', 'Data removed with success');

        return new Response(200, ['Location' => '/admin']);
    }
}