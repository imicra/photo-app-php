<?php

declare(strict_types=1);

namespace App;

class PhotoApplication
{
    private PhotoRepositoryCreator $creator;

    public function __construct(PhotoRepositoryCreator $creator)
    {
        $this->creator = $creator;
    }

    public function run(): void
    {
        $repository = $this->creator->create();

        $service = new PhotoManagementService($repository, $repository);
    }
}
