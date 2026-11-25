<?php

declare(strict_types=1);

namespace App;

interface PhotoRepositoryInterface extends
    PhotoReaderInterface,
    PhotoWriterInterface
{
}
