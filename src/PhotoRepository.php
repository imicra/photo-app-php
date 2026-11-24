<?php

declare(strict_types=1);

namespace App;

class PhotoRepository implements PhotoReaderInterface, PhotoWriterInterface
{
  private array $photos = [];

  public function save(Photo $photo): void
  {
    $id = $photo->getId();

    $this->ensureIdIsUnique($id);

    $this->photos[$id] = $photo;
  }

  public function findById(int $id): ?Photo
  {
    if (array_key_exists($id, $this->photos)) {
      return $this->photos[$id];
    }

    return null;
  }

  public function delete(int $id): void
  {
    if ($this->findById($id) === null) {
      throw new PhotoNotFoundException('Photo not found');
    }

    unset($this->photos[$id]);
  }

  private function ensureIdIsUnique(int $id): void
  {
    if (array_key_exists($id, $this->photos)) {
      throw new \InvalidArgumentException('A photo with this ID already exists');
    }
  }
}