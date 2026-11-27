<?php

declare(strict_types=1);

namespace Tests;

use App\LoggingPhotoDecorator;
use App\TimingPhotoDecorator;
use App\Photo;
use App\PhotoProcessingStrategy;
use PHPUnit\Framework\TestCase;

class PhotoDecoratorTest extends TestCase
{
    public function testLoggingPhotoDecorator(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $strategy = $this->createMock(PhotoProcessingStrategy::class);
        $decorator = new LoggingPhotoDecorator($strategy);

        $strategy->expects($this->once())->method('process')->with($this->identicalTo($photo));

        $decorator->process($photo);
    }

    public function testTimingPhotoDecorator(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $strategy = $this->createMock(PhotoProcessingStrategy::class);
        $decorator = new TimingPhotoDecorator($strategy);

        $strategy->expects($this->once())->method('process')->with($this->identicalTo($photo));

        $decorator->process($photo);
    }
}
