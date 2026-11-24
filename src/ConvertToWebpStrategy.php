<?php

declare(strict_types=1);

namespace App;

use App\PhotoProcessingStrategy;

class ConvertToWebpStrategy implements PhotoProcessingStrategy
{
  public function process(Photo $photo): void
  {
    // Конвертация в webp
  }
}
