<?php

declare(strict_types=1);

namespace SPC\builder\extension;

use SPC\builder\Extension;
use SPC\util\CustomExt;

#[CustomExt('nano')]
class nano extends Extension
{

    public function patchBeforeBuildconf(): bool
    {
        return true;
    }
}
