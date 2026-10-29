<?php

declare(strict_types=1);

namespace App;

class Photo
{  
  public function __construct(
    private int $id, 
    private string $title, 
    private string $filename
  ) {
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
    if ($title === '') {
      throw new \InvalidArgumentException('Title cannot be empty');
    }
  }
}