<?php


namespace App\Controller\Admin;


use App\Entity\Model\Admin;
use App\Helper\FlashMessageTrait;
use App\Infrastructure\Repository\PdoAdminRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerAdmin implements RequestHandlerInterface
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
        $email = $this->persist->filterEmail($_POST['email']);
        $password = $this->persist->filterPassword($_POST['password']);

        if (array_key_exists('login', $_POST)) {
            $pageRedirect = new Response(302, ['Location' => '/login']);

            if (!$email) return $pageRedirect;
            if (!$password) return $pageRedirect;

            $this->admin->setEmail($email);
            $this->admin->setPassword($password);

            $query = $this->repository->login($this->admin);
            if ($query == FALSE) {
                $this->defineMessage('danger', 'Email or password wrong.');
                return $pageRedirect;
            }
            $_SESSION['logged'] = true;
            return new Response(302, ['Location' => '/admin']);
        }

        if (array_key_exists('register', $_POST)) {
            $pageRedirect = new Response(302, ['Location' => '/register']);

            if (!$email) return $pageRedirect;
            if (!$password) return $pageRedirect;

            $password = password_hash($password, PASSWORD_DEFAULT );

            $this->admin->setEmail($email);
            $this->admin->setPassword($password);
            $this->repository->save($this->admin);
            $this->defineMessage('success', 'User registered with successful');
            return $pageRedirect;
        }
    }
}