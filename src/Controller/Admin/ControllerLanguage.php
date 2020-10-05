<?php


namespace App\Controller\Admin;


use App\Entity\Model\Language;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoLanguageRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerLanguage implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private Persist $persist;
    private PdoLanguageRepository $repository;
    private Language $language;

    public function __construct()
    {
        $this->persist = new Persist();
        $this->repository = new PdoLanguageRepository();
        $this->language = new Language();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $language = $this->persist->filterString($_POST['language'], 'Field wrong');
        if (!$language) return new Response(302,['Location' => '/add-language']);

        $this->language->setNameLanguage($language);
        $this->repository->save($this->language);
        $this->defineMessage('success', 'Save with success');
        return new Response(200, ['Location' => '/admin']);

    }
}