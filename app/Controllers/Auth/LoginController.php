<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Exceptions\BadCredentialException;
use App\Services\UserService\AuthenticationImpl;
use App\ThirdParty\JwtCookie;

class LoginController extends BaseController
{
    private AuthenticationImpl $authServiceImpl;
    private JwtCookie $jwtCookie;

    public function __construct()
    {
        $this->authServiceImpl     = new AuthenticationImpl();
        $this->jwtCookie           = new JwtCookie();
    }

    public function login()
    {
        $email    =$this->request->getVar("email");
        $password =$this->request->getVar("password");

        try {
            // authenticate user
            $userDetails = $this->authServiceImpl->authenticate($email,$password);

            // create token
            $cookie = $this->jwtCookie->createJwtToken($userDetails);


            if($userDetails->getRole()->getName()==="ADMIN"){
                return redirect()
                    ->to(base_url('admin'))
                    ->setCookie('authorization',$cookie)
                    ->setCookie("role","admin");

            }

        } catch (BadCredentialException $e) {
            return redirect()
                ->to(base_url('login'))
                ->with("error", $e->getMessage());

        }
    }

    public function form()
    {
        return view("auth/login");
    }
}