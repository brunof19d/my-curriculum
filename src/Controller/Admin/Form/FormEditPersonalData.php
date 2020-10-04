<?php


namespace App\Controller\Admin\Form;


use App\Helper\RenderHtml;
use App\Infrastructure\Repository\PdoPersonalDataRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormEditPersonalData implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $result = new PdoPersonalDataRepository();
        $id = 1; // Default (1), because there will always be only one row in the personal data table.

        $html = $this->render('admin/form-edit-personal-data.php', [
            'title' => 'Edit Personal Data',
            'row' => $result->getData($id)
        ]);
        return new Response(200, [], $html);
    }
}