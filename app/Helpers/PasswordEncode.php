<?php

namespace App\Helpers;

class PasswordEncode
{
    public static function encryptPassword(string $pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }
}