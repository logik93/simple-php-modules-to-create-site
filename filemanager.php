<?php

class FileManager {
  protected $basePath;

  public function __construct($basePath) {
    $this->basePath = $basePath;
  }

  public function listFiles() {
    return array_diff(scandir($this->basePath), ['.', '..']);
  }

  public function readFile($file) {
    $filePath = $this->basePath . '/' . $file;

    if (!is_readable($filePath)) {
      throw new Exception("File not found or not readable: {$filePath}");
    }

    return file_get_contents($filePath);
  }

  public function writeFile($file, $data) {
    $filePath = $this->basePath . '/' . $file;

    if (file_exists($filePath) && !is_writable($filePath)) {
      throw new Exception("File not writable: {$filePath}");
    }

    return file_put_contents($filePath, $data);
  }

  public function deleteFile($file) {
    $filePath = $this->basePath . '/' . $file;

    if (!file_exists($filePath)) {
      throw new Exception("File not found: {$filePath}");
    }

    return unlink($filePath);
  }
}
