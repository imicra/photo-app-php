<?php

declare(strict_types=1);

namespace App;

use App\PhotoProcessingStrategy;

class ResizePhotoStrategy implements PhotoProcessingStrategy
{
  public function process(Photo $photo): void
  {
    // Уменьшение размера фотографии
  }
}