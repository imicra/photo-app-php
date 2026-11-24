<?php

declare(strict_types=1);

namespace Tests;

use App\Photo;
use PHPUnit\Framework\TestCase;

class PhotoTest extends TestCase
{
  public function testReturnsTitle(): void
  {
    $photo = new Photo(1, 'Закат', 'photo.jpg');
    $this->assertSame('Закат', $photo->getTitle());
  }

  public function testRejectsEmptyTitle(): void
  {
    $photo = new Photo(1, 'Закат', 'photo.jpg');
    $this->expectException(\InvalidArgumentException::class);
    $photo->setTitle('');
  }

  public function testKeepsOriginalTitleWhenNewTitleIsInvalid(): void
  {
    $photo = new Photo(1, 'Закат', 'photo.jpg');

    try {
      $photo->setTitle('');
    } catch (\InvalidArgumentException $e) {
    }

    $this->assertSame('Закат', $photo->getTitle());
  }

  public function testCannotCreatePhotoWithEmptyTitle(): void
  {
    $this->expectException(\InvalidArgumentException::class);

    $photo = new Photo(1, '', 'photo.jpg');
  }

  public function testRejectsTitleContainingOnlyWhitespace(): void
  {
    $this->expectException(\InvalidArgumentException::class);

    new Photo(1, '   ', 'photo.jpg');
  }

  public function testCannotCreatePhotoWithZeroId(): void
  {
    $this->expectException(\InvalidArgumentException::class);

    new Photo(0, 'Закат', 'photo.jpg');
  }

  public function testCannotCreatePhotoWithNegativeId(): void
  {
    $this->expectException(\InvalidArgumentException::class);
    
    new Photo(-5, 'Закат', 'photo.jpg');
  }

  public function testCannotCreatePhotoWithEmptyFilename(): void
  {
    $this->expectException(\InvalidArgumentException::class);

    new Photo(1, 'Закат', '');
  }

  public function testCannotCreatePhotoWithWhitespaceFilename(): void
  {
    $this->expectException(\InvalidArgumentException::class);

    new Photo(1, 'Закат', '    ');
  }
}