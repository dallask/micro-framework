<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 26-Nov-18
 * Time: 14:05
 */

namespace App\Entity\Post;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Content
{
    /**
     * @ORM\Column(type="text")
     */
    private $short;
    /**
     * @ORM\Column(type="text")
     */
    private $full;

    public function __construct(string $short, string $full)
    {
        $this->short = $short;
        $this->full = $full;
    }

    public function getShort(): ?string
    {
        return $this->short;
    }

    public function getFull(): string
    {
        return $this->full;
    }
}
