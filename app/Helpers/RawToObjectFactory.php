<?php

namespace App\Helpers;

use Mappify\Mapper\RawToObject;

class RawToObjectFactory
{
    public static function getInstance()
    {
        return new RawToObject();
    }
}