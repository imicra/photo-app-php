<?php

declare(strict_types=1);

namespace App;

class PhotoProcessor
{
  private PhotoProcessingStrategy $processor;

  public function __construct(PhotoProcessingStrategy $processor)
  {
    $this->processor = $processor;
  }

  public function process(Photo $photo): void
  {
    $this->processor->process($photo);
  }

  public function setStrategy(PhotoProcessingStrategy $processor): void
  {
    $this->processor = $processor;
  }
}
