<?php

namespace App\Helpers;

class UuidGenerator
{
    /**
     * @param int $length default length 15
     * @return string
     */
    public static function generateUUID(int $length = 15)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        $bytes = openssl_random_pseudo_bytes($length);

        for ($i = 0; $i < $length; $i++) {
            $index = ord($bytes[$i]) % $charactersLength;
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}