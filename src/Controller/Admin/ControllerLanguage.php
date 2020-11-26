<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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

    public function __construct(Persist $persist, PdoLanguageRepository $repository, Language $language)
    {
        $this->persist = $persist;
        $this->repository = $repository;
        $this->language = $language;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $language = $this->persist->filterString($_POST['language'], 'Field wrong');
        if (!$language) return new Response(302, ['Location' => '/add-language']);

        $level =  $request->getParsedBody()['level_language'];
        $valueLevel = [
            'Native or Fluent',
            'Advanced',
            'Intermediate',
            'Basic'
        ];

        if (in_array($level, $valueLevel)) {
            $this->language->setLevelLanguage($level);
        } else {
            $this->defineMessage('danger', 'Houston, we have a problem.');

            return new Response(302, ['Location' => '/add-language']);
        }
        $this->language->setNameLanguage($language);

        $this->repository->save($this->language);

        $this->defineMessage('success', 'Save with success');

        return new Response(200, ['Location' => '/add-language']);
    }
}