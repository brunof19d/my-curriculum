<?php


namespace App\Controller\Admin;

use App\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerContact implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $pageRedirect = new Response(302, ['Location' => '/contact']);
            $filter = new Persist();

            $name = $filter->filterString($_POST['name'], 'Field name wrong');
            if (!$name) return $pageRedirect;

            $email = $filter->filterEmail($_POST['email']);
            if (!$email) return $pageRedirect;

            $text = $filter->filterString($_POST['text'],'Field message wrong');
            if (!$text) return $pageRedirect;

            $message = "New message sent by the site:
               Name: $name,
               Email: $email,
               Text: $text
            ";

            /* Test was done on @ gmail.com because it is a localhost, if you upload a server it is necessary
             configurations in the PHPMailer class, see the documentation at GitHub https://github.com/PHPMailer/PHPMailer */
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = 'youremail@email.com';
            $mail->Password = 'password';

            $mail->setFrom('from@example.com', 'Name');
            $mail->addAddress('email@email.com', 'Name');
            $mail->Subject = 'Contact form website';
            $mail->Body = $message;

            if ($mail->send()) {
                $this->defineMessage('success', 'Message sent');
                return new Response(200, ['Location' => '/home']);
            } else {
                throw new Exception($mail->ErrorInfo);
            }
        } catch (Exception $error) {
            $this->defineMessage('danger', $error->getMessage());
            return $pageRedirect;
        }
    }
}