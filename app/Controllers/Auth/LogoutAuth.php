<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class LogoutAuth extends BaseController
{
    public function logout()
    {
        // 1. delete cookie JWT
        setcookie('authorization', '', time() - 3600, '/', '', false, true);

        // 2. Redirect to login page
        return redirect()->to('/login');
    }
}