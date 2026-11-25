<?php

declare(strict_types=1);

namespace App;

class LocalPhotoRepositoryCreator extends PhotoRepositoryCreator
{
    public function create(): PhotoRepositoryInterface
    {
        return new LocalPhotoRepository();
    }
}
