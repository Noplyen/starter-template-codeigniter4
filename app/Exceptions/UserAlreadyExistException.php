<?php

namespace App\Exceptions;

class UserAlreadyExistException extends \Exception
{
    public function __construct(string $message,... $args)
    {
        $messageFormat = sprintf($message,...$args);
        parent::__construct($messageFormat);
    }
}