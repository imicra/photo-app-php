<?php

declare(strict_types=1);

namespace Tests;

use App\Photo;
use App\PhotoRepository;
use App\PhotoNotFoundException;
use PHPUnit\Framework\TestCase;

class PhotoRepositoryTest extends TestCase
{
  public function testReturnsSavedPhotoById(): void
  {
    $repository = new PhotoRepository();
    $photo = new Photo(1, 'Закат', 'photo.jpg');

    $repository->save($photo);
    $result = $repository->findById(1);

    $this->assertSame($photo, $result);
  }

  public function testReturnsNullWhenPhotoDoesNotExist(): void
  {
    $repository = new PhotoRepository();
    $result = $repository->findById(999);

    $this->assertNull($result);
  }

  public function testChangesToRetrievedPhotoAffectOriginalObject(): void
  {
    $repository = new PhotoRepository();
    $photo = new Photo(1, 'Закат', 'photo.jpg');

    $repository->save($photo);
    $result = $repository->findById(1);
    $result->setTitle('Рассвет');

    $this->assertSame('Рассвет', $photo->getTitle());
    $this->assertSame('Рассвет', $result->getTitle());
  }

  public function testCannotSavePhotoWithDuplicateId(): void
  {
    $repository = new PhotoRepository();

    $photo1 = new Photo(1, 'Закат', 'sunset.jpg');
    $photo2 = new Photo(1, 'Рассвет', 'sunrise.jpg');

    $repository->save($photo1);

    $this->expectException(\InvalidArgumentException::class);

    $repository->save($photo2);
  }

  public function testOriginalPhotoRemainsAfterDuplicateIdException(): void
  {
    $exceptionThrown = false;

    $repository = new PhotoRepository();

    $photo1 = new Photo(1, 'Закат', 'sunset.jpg');
    $photo2 = new Photo(1, 'Рассвет', 'sunrise.jpg');

    $repository->save($photo1);

    try {
      $repository->save($photo2);
    } catch(\InvalidArgumentException $e) {
      $exceptionThrown = true;
    }

    $this->assertTrue($exceptionThrown);

    $photo = $repository->findById(1);

    $this->assertSame('Закат', $photo->getTitle());
  }

  public function testRetrievedPhotoIsTheSameInstanceAsSavedPhoto(): void
  {
    $photo = new Photo(1, 'Закат', 'sunset.jpg');

    $repository = new PhotoRepository();

    $repository->save($photo);

    $retrievedPhoto = $repository->findById(1);

    $this->assertSame($photo, $retrievedPhoto);
  }

  public function testDeletesPhoto(): void
  {
    $photo = new Photo(1, 'Закат', 'sunset.jpg');
    $repository = new PhotoRepository();
    $photoId = $photo->getId();

    $repository->save($photo);
    $repository->delete($photoId);

    $this->assertNull($repository->findById($photoId));
  }

  public function testThrowsExceptionWhenDeletingNonexistentPhoto(): void
  {
    $repository = new PhotoRepository();

    $this->expectException(PhotoNotFoundException::class);

    $repository->delete(999);
  }
}