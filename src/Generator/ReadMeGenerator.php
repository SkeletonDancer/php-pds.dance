<?php

declare(strict_types=1);

namespace SkeletonDancer\Dance\Pds\Generator;

use SkeletonDancer\Generator;
use SkeletonDancer\Service\Filesystem;

final class ReadMeGenerator implements Generator
{
    private $filesystem;
    private $twig;

    public function __construct(\Twig_Environment $twig, Filesystem $filesystem)
    {
        $this->twig = $twig;
        $this->filesystem = $filesystem;
    }

    public function generate(array $answers)
    {
        $this->filesystem->dumpFile(
            'README.md',
            $this->twig->render(
                'readme.md.twig',
                $answers
            )
        );
    }
}
