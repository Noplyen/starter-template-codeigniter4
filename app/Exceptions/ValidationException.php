<?php

namespace App\Exceptions;
/**
 * This class used to validation exception, already used by `Request` dir
 *
 * Example usage :
 * see at `Request` dir
 *
 * @author hadissihaslam.in@gmail.com
 */
class ValidationException extends \Exception
{
    private array $validationMessage;
    public function __construct(?array $validationMessage)
    {
        parent::__construct();
        $this->validationMessage = $validationMessage;
    }

    public function getValidationMessage(): array
    {
        return $this->validationMessage;
    }
}