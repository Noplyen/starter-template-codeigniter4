<?php

namespace App\Services\FileService\Interface;

use CodeIgniter\HTTP\Files\UploadedFile;

class FileNameGenerator
{
    public static function generate(UploadedFile $fileImage=null,
                                    string $extension=null,string $prefixFileName="file_")
    {
        if(!empty($extension)){
            return uniqid($prefixFileName) . $extension ;
        }else{
            return uniqid($prefixFileName) . "." . $fileImage->getClientExtension();
        }
    }
}