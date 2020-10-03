<?php


namespace App\Controller\Admin;


use App\Entity\Model\Skill;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoSkillRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerSkills implements RequestHandlerInterface
{
    use FlashMessageTrait;
    private Persist $persist;
    private Skill $skill;
    private PdoSkillRepository $repository;

    public function __construct()
    {
        $this->persist = new Persist();
        $this->skill = new Skill();
        $this->repository = new PdoSkillRepository();
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pageRedirect = new Response(302, ['Location' => '/add-skills']);
        if ( array_key_exists( 'category_skill', $_POST ) ) {
            $category = $this->persist->filterId($_POST['category_skill']);
            if (!$category) return $pageRedirect;

            $nameSkill = $this->persist->filterString($_POST['name_skill'], 'Field name wrong.');
            if (!$nameSkill) return $pageRedirect;

            $this->skill->setCategory($category);
            $this->skill->setNameSkill($nameSkill);
            $this->repository->save($this->skill);
            $this->defineMessage('success', 'Saved with success');
            return new Response(200, ['Location' => '/edit-skills']);
        }
    }
}