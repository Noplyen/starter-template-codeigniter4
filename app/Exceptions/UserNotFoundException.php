<?php

namespace App\Exceptions;
/**
 * This class when user account doesn't found
 *
 * @author hadissihaslam.in@gmail.com
 */
class UserNotFoundException extends \Exception
{
    public function __construct(string $message,... $args)
    {
        $messageFormat = sprintf($message,...$args);
        parent::__construct($messageFormat);
    }
}