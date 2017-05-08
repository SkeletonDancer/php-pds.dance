<?php

declare(strict_types=1);

namespace SkeletonDancer\Dance\Pds\Generator;

use SkeletonDancer\Generator;
use SkeletonDancer\Service\Filesystem;

final class ComposerGenerator implements Generator
{
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function generate(array $configuration)
    {
        $composer = [
            'name' => $configuration['package_name'],
            'type' => 'library',
            'description' => '',
            'homepage' => '',
            'license' => $configuration['license'],
            'authors' => [
                [
                    'name' => $configuration['author_name'],
                    'email' => $configuration['author_email'],
                ],
            ],
            'require' => new \stdClass(),
            'require-dev' => new \stdClass(),
            'autoload' => [
                $configuration['namespace'].'\\' => 'src',
            ],
            'autoload-dev' => [
                $configuration['namespace'].'\\Tests\\' => 'tests',
            ],
        ];

        $this->filesystem->dumpFile(
            'composer.json',
            // Add extra newline to content to fix content mismatch when dumping
            json_encode($composer, JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES)."\n"
        );
    }
}
