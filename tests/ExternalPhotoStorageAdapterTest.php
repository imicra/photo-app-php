<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use App\Photo;
use App\PhotoRepository;
use App\ExternalPhotoStorage;
use App\ExternalPhotoStorageAdapter;
use App\PhotoNotFoundException;

class ExternalPhotoStorageAdapterTest extends TestCase
{
    public function testAdapterSave(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $repository = new PhotoRepository();
        $repository->save($photo);
        $library = $this->createMock(ExternalPhotoStorage::class);
        $adapter = new ExternalPhotoStorageAdapter($library, $repository);

        $library->expects($this->once())
            ->method('uploadFile')
            ->with('photo.jpg', 'Закат')
            ->willReturn(true);

        $adapter->save($photo);
    }

    public function testAdapterSaveThrowsExceptionOnFailure():void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $repository = new PhotoRepository();
        $repository->save($photo);
        $library = $this->createMock(ExternalPhotoStorage::class);
        $adapter = new ExternalPhotoStorageAdapter($library, $repository);

        $library->expects($this->once())
            ->method('uploadFile')
            ->with('photo.jpg', 'Закат')
            ->willReturn(false);

        $this->expectException(\RuntimeException::class);
        $adapter->save($photo);
    }

    public function testAdapterDelete(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $repository = new PhotoRepository();
        $repository->save($photo);
        $library = $this->createMock(ExternalPhotoStorage::class);
        $adapter = new ExternalPhotoStorageAdapter($library, $repository);

        $library->expects($this->once())
            ->method('removeFile')
            ->with('photo.jpg')
            ->willReturn(true);

        $adapter->delete(1);
    }

    public function testAdapterDeleteThrowsExceptionWhenPhotoNotFound(): void
    {
        $repository = new PhotoRepository();
        $library = $this->createMock(ExternalPhotoStorage::class);
        $adapter = new ExternalPhotoStorageAdapter($library, $repository);

        $library->expects($this->never())
            ->method('removeFile');

        $this->expectException(PhotoNotFoundException::class);
        $adapter->delete(999);
    }

    public function testAdapterDeleteThrowsExceptionOnFailure(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $repository = new PhotoRepository();
        $repository->save($photo);
        $library = $this->createMock(ExternalPhotoStorage::class);
        $adapter = new ExternalPhotoStorageAdapter($library, $repository);

        $library->expects($this->once())
            ->method('removeFile')
            ->with('photo.jpg')
            ->willReturn(false);

        $this->expectException(\RuntimeException::class);

        $adapter->delete(1);
    }
}
