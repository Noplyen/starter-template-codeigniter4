<?php

namespace App\Services\UserService;

use App\Entities\Users\Role;
use App\Entities\Users\UserMapper;
use App\Entities\Users\Users;
use App\Exceptions\DataNotFoundException;
use App\Exceptions\FailedInsertDataException;
use App\Exceptions\FailedUpdateDataException;
use App\Exceptions\UserAlreadyExistException;
use App\Helpers\AppLogger;
use App\Helpers\ExceptionMessageHelper;
use App\Helpers\PasswordEncode;
use App\Helpers\RawToObjectFactory;
use App\Helpers\UuidGenerator;
use App\Models\Users\UserModel;
use Config\Services;
use Monolog\Logger;
use Ramsey\Collection\Collection;

class UserService
{
    private UserModel $userModel;
    private Logger $appLogger;
    /**
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        $this->appLogger = AppLogger::getMonologConfig();
        $this->userModel = $userModel;
    }

    public function getAllUsers()
    {
        $result = $this->userModel->getAllData();

        return $result;
    }

    /**
     * @throws DataNotFoundException
     */
    public function getUserByEmail(string $email)
    {
        $result = $this->userModel->getDataByName($email);

        return UserMapper::getUser($result);
    }

}