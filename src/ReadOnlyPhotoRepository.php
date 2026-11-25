<?php

declare(strict_types=1);

namespace App;

class ReadOnlyPhotoRepository implements PhotoReaderInterface
{
    public function findById(int $id): ?Photo
    {
        return null;
    }
}
