<?php

declare(strict_types=1);

namespace App;

interface PhotoRepositoryInterface
{
    public function save(Photo $photo): void;

    public function findById(int $id): ?Photo;

    public function delete(int $id): void;
}