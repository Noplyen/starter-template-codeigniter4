<?php
namespace App\Exceptions;

use Exception;

/**
 * This class used to exception when data search not found,
 * this class need to catch or handle
 *
 * Example usage :
 * ```
 * throw new DataNotFound("user with username %s not found",$username);
 * ```
 * @author hadissihaslam.in@gmail.com
 */
class DataNotFoundException extends Exception
{
    public function __construct(string $message,... $args)
    {
        $messageFormat = sprintf($message,...$args);
        parent::__construct($messageFormat);
    }
}