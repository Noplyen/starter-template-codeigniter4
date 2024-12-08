<?php

namespace App\Exceptions;
/**
 *
 * @author hadissihaslam.in@gmail.com
 */
class DataAlreadyExistException extends \Exception
{
    public function __construct(string $message,... $args)
    {
        $messageFormat = sprintf($message,...$args);
        parent::__construct($messageFormat);
    }
}