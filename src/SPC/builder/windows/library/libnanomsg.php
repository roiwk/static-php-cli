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
                '-B .. ' .
                '-A x64 ' .
                '-DCMAKE_BUILD_TYPE=Release ' .
                '-DBUILD_SHARED_LIBS=OFF ' .
                '-DBUILD_STATIC_LIBS=ON ' .
                '-DCMAKE_INSTALL_PREFIX=' . BUILD_ROOT_PATH . ' '
                )
            ->execWithWrapper(
                $this->builder->makeSimpleWrapper('cmake'),
                     '--build . --config Release --target install'
            );
        copy(BUILD_LIB_PATH . '\libnanomsg.lib', BUILD_LIB_PATH . '\nanomsg.lib');
    }

}
