<?php

declare(strict_types=1);

namespace App;

use App\PhotoProcessingStrategy;

class LoggingPhotoDecorator implements PhotoProcessingStrategy
{
    private PhotoProcessingStrategy $strategy;

    public function __construct(PhotoProcessingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }


    public function process(Photo $photo): void
    {
        echo 'Logging';

        $this->strategy->process($photo);
    }
}
