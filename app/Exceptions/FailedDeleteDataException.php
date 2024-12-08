<?php

namespace App\Exceptions;


use App\Helpers\AppLogger;
use App\Helpers\LoggerContextHelper;
use Monolog\Logger;

/**
 * This class used to throw back `ReflectionException` when
 * failed to performing query to database
 *
 *
 * @author hadissihaslam.in@gmail.com
 */
class FailedDeleteDataException extends \RuntimeException
{
    private Logger $appLogger;
    public function __construct(string $message,
                                \Throwable $previousException=null,
                                ?array $data=null)
    {
        $this->appLogger  = AppLogger::getMonologConfig();

        parent::__construct($message);

        $c = LoggerContextHelper::contextualMessage
        (
            $previousException->getMessage(),
            $previousException->getTrace(),
            $data,
        );

        $this->appLogger->error($message,$c);

    }
}