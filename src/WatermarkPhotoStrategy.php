<?php

declare(strict_types=1);

namespace App;

use App\PhotoProcessingStrategy;

class WatermarkPhotoStrategy implements PhotoProcessingStrategy
{
  public function process(Photo $photo): void
  {
    // Добавление водяного знака
  }
}