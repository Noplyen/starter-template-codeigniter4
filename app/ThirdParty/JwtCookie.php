<?php

namespace App\ThirdParty;

use App\Entities\Users\UserDetails;
use App\Exceptions\InvalidCookieException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

class JwtCookie
{
    private string $KEY;

    public function __construct()
    {
        $this->KEY = getenv('encryption.key');
    }

    public function createJwtToken(UserDetails $user)
    {
        // set expired time 4 hours
        $expiredTime = time()+14400;

        $payloadJwt = array(
            "exp"=>$expiredTime,
            "id"=>$user->getId(),
            "privileges"=>$user->getPrivileges(),
            "role"=>$user->getRole()->getName()
        );

        return JWT::encode($payloadJwt,$this->KEY,'HS256');
    }

    /**
     * validate cookie jwt user
     * @param $jwtCookie
     * @return stdClass object {to access : jwt->username}
     * @throws InvalidCookieException when cookie had invalid value
     */
    public function validateJwtToken($jwtCookie): stdClass
    {

        try{
            $result = JWT::decode($jwtCookie, new Key($this->KEY, 'HS256'));

            return $result;

        }catch (\Exception $exception){
            throw new InvalidCookieException($exception);
        }
    }

}