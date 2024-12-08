<?php

namespace App\Exceptions;

/**
 * This class for JWT cookie, when decode jwt
 *
 * Example usage :
 * ```
 * catch (\Exception $exception){
 * throw new InvalidCookieException($exception);
 * }
 * // to get previous message
 * $exception->getPrevious->getMessage()
 * ```
 *
 * @author hadissihaslam.in@gmail.com
 */
class InvalidCookieException extends \Exception
{
    protected $message = "your session has expired, please login";
    public function __construct(?\Throwable $previous)
    {
        parent::__construct($this->message,0,$previous);
    }

}