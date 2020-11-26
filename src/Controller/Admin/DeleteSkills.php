<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Admin;

use App\Entity\Model\Skill;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoSkillRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteSkills implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Persist $persist;
    private PdoSkillRepository $repository;
    private Skill $skill;

    public function __construct(Persist $persist, PdoSkillRepository $repository, Skill $skill)
    {
        $this->persist = $persist;
        $this->repository = $repository;
        $this->skill = $skill;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/edit-skills']);

        $id = $this->persist->filterId($request->getQueryParams()['id']);
        if (!$id) return $redirectLogin;

        $this->skill->setId($id);
        $this->repository->remove($this->skill);

        $this->defineMessage('success', 'Data education remove with success');

        return $redirectLogin;
    }
}