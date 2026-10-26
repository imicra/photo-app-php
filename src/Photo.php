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
      try {
        $this->validateTitle($title);
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
  }

  private function validateTitle(string $title): void
  {
    if (empty($title)) {
      throw new \Exception('Title cannot be empty');
    } else {
      $this->title = $title;
    }
  }
}