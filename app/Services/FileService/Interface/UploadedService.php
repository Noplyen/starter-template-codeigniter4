<?php

namespace App\Services\FileService\Interface;

use CodeIgniter\HTTP\Files\UploadedFile;

interface UploadedService
{
    /**
     * @param UploadedFile $file
     * @param string $fileName
     * @param string $pathSaved if null will store at default path
     * @return mixed
     */
    public function save(UploadedFile $file,
                         string       $fileName,
                         string       $pathSaved);
    public function delete(string $fileName,string $path);
}