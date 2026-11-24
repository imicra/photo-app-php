<?php

declare(strict_types=1);

namespace App;

class PhotoService
{
    private PhotoRepositoryInterface $repository;

    public function __construct(
        PhotoRepositoryInterface $repository
    ) {
      $this->repository = $repository;
    }

    public function getPhoto(int $id): ?Photo
    {
        return $this->repository->findById($id);
    }

    public function savePhoto(Photo $photo): void
    {
        $this->repository->save($photo);
    }

    public function deletePhoto(int $id): void
    {
        $this->repository->delete($id);
    }
}