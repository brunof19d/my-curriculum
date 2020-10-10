<?php


namespace App\Helper;


trait RenderHtml
{
    /**
     * Render HTML by calling all data passed in the function.
     * @param string $templatePath Template HTML Render.
     * @param array $data Data as a variable to pass
     * @return string
     */
    public function render(string $templatePath, array $data): string
    {
        extract($data);
        ob_start();
        require_once __DIR__ . '/../../resources/view/templates/' . $templatePath;
        $html = ob_get_clean();
        return $html;
    }
}