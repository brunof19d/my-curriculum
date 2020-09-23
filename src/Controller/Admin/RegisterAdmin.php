<?php


namespace App\Controller\Admin;


use App\Entity\Model\Admin;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoAdminRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RegisterAdmin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private Admin $admin;
    private PdoAdminRepository $repository;
    private Persist $persist;

    public function __construct()
    {
        $this->admin = new Admin();
        $this->repository = new PdoAdminRepository();
        $this->persist = new Persist();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirectLogin = new Response(302, ['Location' => '/register']);
        $email = $_POST['email'];
        $password = $_POST['password'];

        $resultEmail = $this->persist->filterEmail($email);

        if ($resultEmail == false ) {
            return $redirectLogin;
        }

        $resultPassword =  $this->persist->filterPassword($password);
        if ($resultPassword == false) {
            return $redirectLogin;
        }

        $this->admin->setEmail($resultEmail);
        $this->admin->setPassword($resultPassword);
        $this->repository->save($this->admin);
        $this->defineMessage('success', 'User registered with successful');
        return $redirectLogin;
    }
}