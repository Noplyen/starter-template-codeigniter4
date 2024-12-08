<?php

namespace App\Helpers;

use App\ThirdParty\MonologConfig;

class AppLogger
{
    public static function getMonologConfig()
    {
        $logger = new MonologConfig();

        // passing parameter true will generate log file
        return $logger->config();
    }
}