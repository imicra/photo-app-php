<?php

declare(strict_types=1);

namespace App;

class LocalPhotoRepository implements PhotoRepositoryInterface
{
    public function save(Photo $photo): void
    {

    }

    public function delete(int $id): void
    {

    }

    public function findById(int $id): ?Photo
    {
        return null;
    }
}
