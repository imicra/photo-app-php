<?php

declare(strict_types=1);

namespace App;

use App\ExternalPhotoStorage;
use App\PhotoNotFoundException;

class ExternalPhotoStorageAdapter implements PhotoWriterInterface
{
    private ExternalPhotoStorage $external;
    private PhotoReaderInterface $reader;

    public function __construct(
        ExternalPhotoStorage $external,
        PhotoReaderInterface $reader
    )
    {
        $this->external = $external;
        $this->reader = $reader;
    }

    public function save(Photo $photo): void
    {
        $path = $photo->getFilename();
        $name = $photo->getTitle();

        $result = $this->external->uploadFile($path, $name);

        if (!$result) {
            throw new \RuntimeException('Failed to upload photo');
        }
    }

    public function delete(int $id): void
    {
        $photo = $this->reader->findById($id);

        if (!$photo) {
            throw new PhotoNotFoundException('Photo not found');
        }

        $name = $photo->getFilename();

        $result = $this->external->removeFile($name);

        if (!$result) {
            throw new \RuntimeException('Failed to delete photo');
        }
    }
}
