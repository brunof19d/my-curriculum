<?php


namespace App\Controller\Admin;



use App\Entity\Admin;
use App\Helper\FlashMessageTrait;
use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class MakeLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $admin = new Admin();
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        if (is_null($email) || $email === false) {
            $redirectLogin = new Response(302, ['Location' => '/login']);
            $this->defineMessage('danger', 'Email is not valid');
            return $redirectLogin;
        }
        $admin->setEmail($email);
        $_SESSION['logged'] = true;
        return new Response(302, ['Location' => '/admin']);
    }
}