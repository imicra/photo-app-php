<?php

namespace App;

class ExternalPhotoStorage
{
    public function uploadFile(string $path, string $name): bool
    {
        // Загрузка файла во внешнее хранилище
        return true;
    }

    public function removeFile(string $name): bool
    {
        // Удаление файла
        return true;
    }
}
