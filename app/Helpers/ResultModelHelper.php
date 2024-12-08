<?php

namespace App\Helpers;

use App\Exceptions\DataNotFoundException;

class ResultModelHelper
{
    /**
     * @param $result
     * @param string $dataClass name of data {ex : user entity pass user to param}
     * or you can pass more details like 'user with name x'
     * @throws DataNotFoundException
     */
    public static function isResultEmpty($result, string $dataClass): void
    {
        if(empty($result)){
            throw new DataNotFoundException(ExceptionMessageHelper::dataNotFound(class_basename($dataClass)));
        }
    }
}