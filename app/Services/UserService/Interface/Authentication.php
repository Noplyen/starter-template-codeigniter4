<?php

namespace App\Services\UserService\Interface;

use App\Entities\Users\UserDetails;
use App\Exceptions\BadCredentialException;
use App\Request\auth\Login;

interface Authentication
{
    /**
     * this method performing authenticate user login
     * @param string $username
     * @param string $password
     * @return UserDetails
     * @throws BadCredentialException
     */
    public function authenticate(string $username,string $password): UserDetails;
    public function hasAuthority(array $needlePrivilege,array $userPrivilege);
}