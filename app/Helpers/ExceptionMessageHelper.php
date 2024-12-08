<?php

namespace App\Helpers;

class ExceptionMessageHelper
{
    public static function failedInsertException(string $dataName): string
    {
        return "failed insert data {$dataName}";
    }
    public static function failedDeleteException(string $dataName): string
    {
        return "failed delete data {$dataName}";
    }

    public static function failedUpdateException(string $dataName): string
    {
        return "failed update data {$dataName}";
    }

    public static function dataNotFound(string $argument=""): string
    {
        return "data {$argument} not found";
    }

}