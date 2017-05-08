<?php

declare(strict_types=1);

namespace SkeletonDancer\Dance\Pds\Generator;

use SkeletonDancer\Generator;
use SkeletonDancer\Service\Filesystem;

final class GitConfigGenerator implements Generator
{
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function generate(array $configuration)
    {
        $this->filesystem->dumpFile('.gitignore', "/vendor/\n");
    }
}
