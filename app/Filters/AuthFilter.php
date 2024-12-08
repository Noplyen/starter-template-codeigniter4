<?php

namespace App\Filters;

use App\Exceptions\BadCredentialException;
use App\Exceptions\InvalidCookieException;
use App\Exceptions\NotAuthorityException;
use App\Helpers\AppLogger;
use App\Services\UserService\AuthenticationImpl;
use App\ThirdParty\JwtCookie;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Monolog\Logger;

class AuthFilter implements FilterInterface
{
    private JwtCookie $jwtCookie;
    private Logger $appLogger;
    private AuthenticationImpl $authentication;

    public function __construct()
    {
        $this->jwtCookie    = new JwtCookie();
        $this->appLogger    = AppLogger::getMonologConfig();
        $this->authentication    = new AuthenticationImpl();
    }

    public function before(RequestInterface $request, $arguments = null)
    {

        try {
            // getting cookie authorization
            $cookie = request()->getCookie('authorization');

            // is user have a cookie?
            if(empty($cookie)){
                return redirect()->to(base_url('login'));
            }

            // validate cookie
            $result = $this->jwtCookie->validateJwtToken($cookie);

            // when the routes have any argument for privileges access
            if($arguments!=null){

                $this->authentication->hasAuthority($arguments,$result->privileges);
            }



        } catch (InvalidCookieException $e) {

            $this->appLogger->debug('cookie invalid ',['message-err'=>$e->getMessage()]);

            return  redirect()
                ->to(base_url('login'))
                ->with("message",$e->getMessage());

        } catch (NotAuthorityException $e) {

            return  redirect()
                ->back()
                ->with("message",$e->getMessage());

        }catch (BadCredentialException $e){

            return  redirect()
                ->to(base_url('login'))
                ->with("message",$e->getMessage());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}