<?php

declare(strict_types=1);

namespace App;

interface PhotoReaderInterface
{
    public function findById(int $id): ?Photo;
}