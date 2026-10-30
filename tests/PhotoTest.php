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
}