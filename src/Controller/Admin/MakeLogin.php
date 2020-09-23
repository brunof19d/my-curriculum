<?php


namespace App\Controller\Admin;


use App\Entity\Model\Admin;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoAdminRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class MakeLogin implements RequestHandlerInterface
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
        $redirectLogin = new Response(302, ['Location' => '/login']);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $resultEmail =  $this->persist->filterEmail($email);
        if ($resultEmail == false ) {
            return $redirectLogin;
        }

        $resultPassword =  $this->persist->filterPassword($password);
        if ($resultPassword == false) {
            return $redirectLogin;
        }

        $this->admin->setEmail($resultEmail);
        $this->admin->setPassword($resultPassword);
        $query = $this->repository->login($this->admin);

        if ($query == FALSE) {
            $this->defineMessage('danger', 'Email or password wrong.');
            return $redirectLogin;
        }
        $_SESSION['logged'] = true;
        return new Response(302, ['Location' => '/admin']);
    }
}