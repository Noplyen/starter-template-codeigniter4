<?php

namespace App\Services\UserService;

use App\Entities\Users\UserDetails;
use App\Exceptions\BadCredentialException;
use App\Exceptions\NotAuthorityException;
use App\Helpers\AppLogger;
use App\Services\UserService\Interface\Authentication;
use Config\Services;
use Monolog\Logger;

class AuthenticationImpl implements Authentication
{
    private Logger $appLogger;
    private UserDetailServiceImpl $userDetailServiceImpl;

    public function __construct()
    {
        $this->userDetailServiceImpl = Services::userDetailService();
        $this->appLogger = AppLogger::getMonologConfig();
    }

    /**
     * @throws BadCredentialException
     */
    public function authenticate(string $username,string $password): UserDetails
    {
        // get user details
        $user = $this->userDetailServiceImpl->getUserDetails($username);

        // check when user account was suspend
        if($user->isSuspend()){
            throw new BadCredentialException('your account has been suspended');
        }

        // validate password
        if(password_verify($password,$user->getPassword()))
        {
            $this->appLogger->info('user successfully login',['username'=>$user->getEmail()]);

            return $user;

        }else{
            throw new BadCredentialException('username or password are incorrect');
        }
    }

    /**
     * this method for authority check
     *
     * @throws NotAuthorityException
     */
    public function hasAuthority(array $needlePrivilege, array $userPrivilege)
    {
        foreach ($needlePrivilege as $privilege) {
            if (in_array($privilege, $userPrivilege)) {
                return true;
            }
        }
        throw new NotAuthorityException();
    }
}