<?php

namespace App\Services\FileService;

use App\Helpers\AppLogger;
use App\Services\FileService\Interface\PATH_DIRECTORY;
use App\Services\FileService\Interface\UploadedService;
use CodeIgniter\HTTP\Files\UploadedFile;
use Monolog\Logger;

class FileService implements UploadedService
{
    private Logger $appLogger;

    public function __construct()
    {
        $this->appLogger = AppLogger::getMonologConfig();
    }

    public function save(UploadedFile $file, string $fileName, string $pathSaved)
    {
            $this->moveFile($file,$fileName,$pathSaved);
    }

    public function delete(string $fileName,string $path)
    {
        if(unlink($path.$fileName)) {
            $this->appLogger->info('success delete file ', ['name' => $fileName]);
        }
    }

    private function moveFile(UploadedFile $file,
                              string       $fileName,
                              string       $path)
    {
        try {
            $file->move($path, $fileName);

            $this->appLogger->debug("success to move image",
                [
                    "name"=>$fileName,
                    "path"=>$path
                ]);

        }catch (\Exception $exception){
            throw new \RuntimeException($exception->getMessage());
        }
    }
}