<?php

namespace App\Services\UserService\Interface;

use App\Entities\Users\UserDetails;

interface UserDetailService
{
    /**
     * getting user details object
     * for purpose privilege user
     * @param string $email
     * @return UserDetails
     */
    public function getUserDetails(string $email):UserDetails;
}