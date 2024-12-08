<?php

namespace App\Entities\Users;

use App\Helpers\RawToObjectFactory;
use function Symfony\Component\String\u;

class UserMapper
{
    public static function getUser(array $raw):Users
    {
        $mappify  = RawToObjectFactory::getInstance();

        $user = $mappify->getObject(
            $raw,
            Users::class,
            [
                "id"=>"user_id"
            ]);

        $role = $mappify->getObject(
            $raw,
            Role::class,
            ["id"=>"role_id","name"=>"role_name"]
        );

        $user->setRole($role);

        return $user;
    }

}