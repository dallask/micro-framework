<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Nov-18
 * Time: 10:54
 */

namespace App\Http\Action\Blog;

use App\ReadModel\PostReadRepository;
use Framework\Template\TemplateRenderer;
use Zend\Diactoros\Response\HtmlResponse;

class IndexAction
{

    private $posts;
    private $template;

    public function __construct(
        PostReadRepository $posts,
        TemplateRenderer $template
    ) {
        $this->posts = $posts;
        $this->template = $template;
    }

    public function __invoke()
    {
        $posts = $this->posts->getAll();

        return new HtmlResponse(
            $this->template->render(
                'app/blog/index',
                [
                    'posts' => $posts,
                ]
            )
        );
    }
}
