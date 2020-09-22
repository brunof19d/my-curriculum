<?php


namespace App\Helper;


trait RenderHtml
{
    public function render(string $templatePath, array $data): string
    {
        extract($data);
        ob_start();
        require_once __DIR__ . '/../../resources/view/templates/' . $templatePath;
        $html = ob_get_clean();
        return $html;
    }
}