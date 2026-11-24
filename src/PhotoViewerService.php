<?php

declare(strict_types=1);

namespace App;

class PhotoViewerService
{
    private PhotoReaderInterface $repository;

    public function __construct(
        PhotoReaderInterface $repository
    ) {
      $this->repository = $repository;
    }

    public function getPhoto(int $id): ?Photo
    {
        return $this->repository->findById($id);
    }
}