<?php

declare(strict_types=1);

namespace Tests;

use App\PhotoRepository;
use App\DatabasePhotoRepository;
use App\Photo;
use App\PhotoService;
use App\PhotoViewerService;
use App\PhotoManagementService;
use App\PhotoNotFoundException;
use PHPUnit\Framework\TestCase;

class PhotoServiceTest extends TestCase
{
  // public function testPhotoRepository(): void
  // {
  //   $photo = new Photo(1, 'Закат', 'sunset.php');
  //   $photoRepository = new PhotoRepository();
  //   $service = new PhotoService($photoRepository);
    
  //   $photoRepository->save($photo);
  //   $result = $service->getPhoto(1);

  //   $this->assertNull($service->getPhoto(999));
  //   $this->assertSame($photo, $result);
  // }

  // public function testDatabasePhotoRepository(): void
  // {
  //   $repository = new DatabasePhotoRepository();
  //   $service = new PhotoService($repository);

  //   $this->assertNull($service->getPhoto(1));
  // }

  // public function testPhotoService(): void
  // {
  //   $photoRepository = new PhotoRepository();
  //   $service = new PhotoService($photoRepository);
  //   $photo = new Photo(1, 'Закат', 'sunset.php');

  //   $service->savePhoto($photo);
  //   $servicePhoto = $service->getPhoto($photo->getId());

  //   $this->assertSame($photo, $servicePhoto);
  // }

  // public function testDeletePhoto(): void
  // {
  //   $photoRepository = new PhotoRepository();
  //   $service = new PhotoService($photoRepository);
  //   $photo = new Photo(1, 'Закат', 'sunset.php');

  //   $service->savePhoto($photo);
  //   $service->deletePhoto($photo->getId());

  //   $this->assertNull($service->getPhoto($photo->getId()));
  // }

  // public function testDeletePhotoThrowsExceptionWhenPhotoNotFound(): void
  // {
  //   $service = new PhotoService(new PhotoRepository());

  //   $this->expectException(PhotoNotFoundException::class);

  //   $service->deletePhoto(999);
  // }


  public function testPhotoViewerService(): void
  {
    $photo = new Photo(1, 'Закат', 'sunset.php');
    $repository = new PhotoRepository();

    $repository->save($photo);

    $service = new PhotoViewerService($repository);

    $result = $service->getPhoto(1);

    $this->assertSame($photo, $result);
  }

  public function testPhotoManagementService(): void
  {
    $photo = new Photo(1, 'Закат', 'sunset.php');
    $repository = new PhotoRepository();

    $service = new PhotoManagementService(
        $repository,
        $repository
    );

    $service->savePhoto($photo);
    $result = $service->getPhoto($photo->getId());

    $this->assertSame($photo, $result);

    $service->deletePhoto($photo->getId());

    $this->assertNull($service->getPhoto($photo->getId()));
  }

  public function testPhotoReaderInterface(): void
  {
    $photo = new Photo(1, 'Закат', 'sunset.php');
    $repository = new PhotoRepository();

    $repository->save($photo);

    $service = new PhotoViewerService($repository);

    $result = $service->getPhoto(1);

    $this->assertSame($photo, $result);
    $this->assertNull($service->getPhoto(999));
  }
}