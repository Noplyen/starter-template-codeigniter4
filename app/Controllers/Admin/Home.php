<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Users\UserMapper;
use Config\Services;

class Home extends BaseController
{
    public function index()
    {
        return view('admin/home');
    }

    public function getData()
    {
        $userService = Services::userService();
        $data = $userService->getAllUsers();

        $arr = [];

        foreach ($data as $var) {
            // Map to object user
            $userObj = UserMapper::getUser($var);

            // Pastikan objek bisa dikonversi menjadi array
            if ($userObj) {
                $arr[] = $userObj->toArray(); // Mengonversi objek menjadi array
            }
        }

        // Kembalikan data dalam format JSON menggunakan setJSON()
        return $this->response->setJSON(['data' => $arr]);
    }

}