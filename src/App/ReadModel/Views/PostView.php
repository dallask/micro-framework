<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 21-Nov-18
 * Time: 10:31
 */

namespace App\ReadModel\Views;

class PostView
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var \DateTimeImmutable
     */
    public $date;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $content;
}
