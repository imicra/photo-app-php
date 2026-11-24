<?php

declare(strict_types=1);

namespace App;

class PhotoManagementService
{
    private PhotoReaderInterface $reader;

    private PhotoWriterInterface $writer;

    public function __construct(
        PhotoReaderInterface $reader,
        PhotoWriterInterface $writer
    ) {
      $this->reader = $reader;
      $this->writer = $writer;
    }

    public function getPhoto(int $id): ?Photo
    {
        return $this->reader->findById($id);
    }

    public function savePhoto(Photo $photo): void
    {
        $this->writer->save($photo);
    }

    public function deletePhoto(int $id): void
    {
        $this->writer->delete($id);
    }
}