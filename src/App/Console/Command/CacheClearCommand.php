<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 22-Nov-18
 * Time: 13:29
 */

namespace App\Console\Command;

use Framework\Console\Input;
use Framework\Console\Output;

class CacheClearCommand
{
    private $paths = [
        'twig' => 'var/cache/twig',
        'db' => 'var/cache/db',
    ];

    public function execute(Input $input, Output $output): void
    {
        $output->comment('Clearing cache');

        $alias = $input->getArgument(0);

        if (empty($alias)) {
            $alias = $input->choose('Choose path', array_merge(['all'], array_keys($this->paths)));
        }

        if ($alias === 'all') {
            $paths = $this->paths;
        } else {
            if (!array_key_exists($alias, $this->paths)) {
                throw new \InvalidArgumentException('Unknown path alias "' . $alias . '"');
            }
            $paths = [$alias => $this->paths[$alias]];
        }

        foreach ($paths as $path) {
            if (file_exists($path)) {
                $output->writeln('Remove ' . $path);
                $this->delete($path);
            } else {
                $output->writeln('Skip ' . $path);
            }
        }

        $output->info('Done!');
    }

    private function delete(string $path): void
    {
        if (!file_exists($path)) {
            throw new \RuntimeException('Undefined path ' . $path);
        }

        if (is_dir($path)) {
            foreach (scandir($path, SCANDIR_SORT_ASCENDING) as $item) {
                if ($item === '.' || $item === '..') {
                    continue;
                }
                $this->delete($path . DIRECTORY_SEPARATOR . $item);
            }
            if (!rmdir($path)) {
                throw new \RuntimeException('Unable to delete directory ' . $path);
            }
        } else {
            if (!unlink($path)) {
                throw new \RuntimeException('Unable to delete file ' . $path);
            }
        }
    }
}