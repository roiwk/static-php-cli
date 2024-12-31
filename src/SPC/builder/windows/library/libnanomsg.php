<?php

declare(strict_types=1);

namespace SPC\builder\windows\library;

use SPC\store\FileSystem;

/**
 * is a template library class for windows
 */
class nanomsg extends WindowsLibraryBase
{

    public const NAME = 'nanomsg';

    public function build(): void
    {

        // reset cmake
        FileSystem::resetDir($this->source_dir . '\build');

        // start build
        cmd()->cd($this->source_dir . '\build')
            ->execWithWrapper(
                $this->builder->makeSimpleWrapper('cmake'),
                    '-DNN_STATIC_LIB=ON '.'-DCMAKE_INSTALL_PREFIX=' . BUILD_ROOT_PATH . ' ..'
                )
            ->execWithWrapper(
                $this->builder->makeSimpleWrapper('cmake'),
                     '--build . --config Release --target install'
            );
    }

}
