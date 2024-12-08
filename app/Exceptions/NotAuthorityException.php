<?php

namespace App\Exceptions;

class NotAuthorityException extends \Exception
{
    public function __construct()
    {
        parent::__construct("you doesn't have access");
    }
}