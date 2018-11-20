<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 20-Nov-18
 * Time: 12:14
 */

namespace Framework\Template;

class TemplateRenderer
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function render($view, array $params = []): string
    {
        $templateFile = $this->path . '/' . $view . '.php';

        ob_start();
        extract($params, EXTR_OVERWRITE);
        require $templateFile;
        return ob_get_clean();
    }
}
