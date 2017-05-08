<?php

declare(strict_types=1);

namespace SkeletonDancer\Dance\Pds\Generator;

use SkeletonDancer\Generator;
use SkeletonDancer\Service\Filesystem;

final class ChangelogGenerator implements Generator
{
    private $filesystem;
    private $twig;

    public function __construct(\Twig_Environment $twig, Filesystem $filesystem)
    {
        $this->twig = $twig;
        $this->filesystem = $filesystem;
    }

    public function generate(array $configuration)
    {
        $this->filesystem->dumpFile(
            'CHANGELOG.md',
           <<<'BODY'
Change Log
==========

All notable changes to this publication will be documented in this file.

## 1.0.0 - ????-??-??

First stable release.

BODY
        );
    }
}
