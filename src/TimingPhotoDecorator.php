<?php

declare(strict_types=1);

namespace App;

class TimingPhotoDecorator implements PhotoProcessingStrategy
{
    private PhotoProcessingStrategy $strategy;

    public function __construct(PhotoProcessingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function process(Photo $photo): void
    {
        $start = microtime(true);

        $this->strategy->process($photo);

        $end = microtime(true);

        echo $end - $start;
    }
}
