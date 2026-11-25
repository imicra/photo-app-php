<?php

declare(strict_types=1);

namespace App;

use App\LocalPhotoRepository;

class PhotoRepositoryFactory
{
    public function create(): PhotoWriterInterface
    {
        return new LocalPhotoRepository();
    }
}
