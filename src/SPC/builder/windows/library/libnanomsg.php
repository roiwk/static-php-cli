<?php

declare(strict_types=1);

namespace SPC\builder\windows\library;

use SPC\store\FileSystem;

/**
 * is a template library class for windows
 */
class libnanomsg extends WindowsLibraryBase
{

    public const NAME = 'libnanomsg';

    public function build(): void
    {

        // reset cmake
        FileSystem::resetDir($this->source_dir . '\build');

        // start build
        cmd()->cd($this->source_dir . '\build')
            ->execWithWrapper(
                $this->builder->makeSimpleWrapper('cmake'),
                '..'
                )
            ->execWithWrapper(
                $this->builder->makeSimpleWrapper('cmake'),
                     '--build . --config Release --target install'
            );
        copy(BUILD_LIB_PATH . '\libnanomsg.lib', BUILD_LIB_PATH . '\nanomsg.lib');
    }

}
