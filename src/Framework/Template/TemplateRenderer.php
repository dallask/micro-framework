<?php
/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 20-Nov-18
 * Time: 12:14
 */

namespace Framework\Template;

interface TemplateRenderer
{
    public function render($name, array $params = []): string;
}
