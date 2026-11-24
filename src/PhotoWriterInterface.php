<?php

declare(strict_types=1);

namespace App;

interface PhotoWriterInterface
{
    public function save(Photo $photo): void;

    public function delete(int $id): void;
}