<?php

declare(strict_types=1);

namespace Tests;

use App\LocalPhotoRepository;
use App\LocalPhotoRepositoryCreator;
use App\PhotoRepositoryInterface;
use App\CloudPhotoRepositoryCreator;
use App\CloudPhotoRepository;
use PHPUnit\Framework\TestCase;

class PhotoRepositoryCreatorTest extends TestCase
{
    public function testLocalPhotoRepositoryCreator(): void
    {
        $creator = new LocalPhotoRepositoryCreator();
        $repository = $creator->create();

        $this->assertInstanceOf(LocalPhotoRepository::class, $repository);
        $this->assertInstanceOf(PhotoRepositoryInterface::class, $repository);
    }

    public function testCloudPhotoRepositoryCreator(): void
    {
        $creator = new CloudPhotoRepositoryCreator();
        $repository = $creator->create();

        $this->assertInstanceOf(CloudPhotoRepository::class, $repository);
        $this->assertInstanceOf(PhotoRepositoryInterface::class, $repository);
    }
}
