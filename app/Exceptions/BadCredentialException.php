<?php

namespace App\Exceptions;
/**
 * This class used to exception when username or password incorrect
 *
 * Example usage :
 * ```
 * throw new BadCredentialException("username or password are incorrect");
 * ```
 * @author hadissihaslam.in@gmail.com
 */
class BadCredentialException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}