<?php

declare(strict_types=1);

namespace App;

class CloudPhotoRepositoryCreator extends PhotoRepositoryCreator
{
    public function create(): PhotoRepositoryInterface
    {
        return new CloudPhotoRepository();
    }
}
