<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 23-Nov-18
 * Time: 10:31
 */

declare(strict_types=1);

namespace Framework\Console;

abstract class Command
{
    private $name;
    private $description;

    public function __construct(string $name = null)
    {
        if ($name !== null) {
            $this->setName($name);
        } else {
            $this->setName(static::class);
        }

        $this->configure();
    }

    protected function configure(): void
    {
    }

    abstract public function execute(Input $input, Output $output): void;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
