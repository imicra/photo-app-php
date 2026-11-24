<?php

declare(strict_types=1);

require __DIR__ . '/src/Photo.php';

use App\Photo;

$photo = new Photo(1, 'Старое название', 'photo.jpg');

$photo->setTitle('Новое название');

echo $photo->getTitle() . PHP_EOL;

try {
    $photo->setTitle('');
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo $photo->getTitle() . PHP_EOL;