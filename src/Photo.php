<?php

declare(strict_types=1);

namespace App;

class Photo
{
  private readonly int $id;
  private string $title;
  private string $filename;

  public function __construct(
    int $id, 
    string $title, 
    string $filename
  ) {
    $this->validateId($id);
    $this->validateTitle($title);
    $this->validateFilename($filename);

    $this->id = $id;
    $this->title = $title;
    $this->filename = $filename;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getFilename(): string
  {
    return $this->filename;
  }

  public function setTitle(string $title): void
  {
      $this->validateTitle($title);

      $this->title = $title;
  }

  private function validateTitle(string $title): void
  {
    if (trim($title) === '') {
      throw new \InvalidArgumentException('Title cannot be empty');
    }
  }

  private function validateId(int $id): void
  {
    if ($id <= 0) {
      throw new \InvalidArgumentException('Photo ID must be greater than zero');
    }
  }

  private function validateFilename(string $filename): void
  {
    if (trim($filename) === '') {
      throw new \InvalidArgumentException('Filename cannot be empty');
    }
  }
}