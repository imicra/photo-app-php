<?php

declare(strict_types=1);

namespace Tests;

use App\Photo;
use App\PhotoProcessingStrategy;
use App\PhotoProcessor;
use PHPUnit\Framework\TestCase;

class PhotoProcessorTest extends TestCase
{
    public function testPhotoProcessor(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $strategy = $this->createMock(PhotoProcessingStrategy::class);
        $processor = new PhotoProcessor($strategy);

        $strategy->expects($this->once())->method('process')->with($this->identicalTo($photo));

        $processor->process($photo);
    }

    public function testCanChangeStrategy(): void
    {
        $photo = new Photo(1, 'Закат', 'photo.jpg');
        $strategyResize = $this->createMock(PhotoProcessingStrategy::class);
        $strategyWatermark = $this->createMock(PhotoProcessingStrategy::class);

        $processor = new PhotoProcessor($strategyResize);

        $strategyResize->expects($this->once())->method('process')->with($this->identicalTo($photo));
        $processor->process($photo);

        $processor->setStrategy($strategyWatermark);

        $strategyWatermark->expects($this->once())->method('process')->with($this->identicalTo($photo));
        $processor->process($photo);
    }
}
