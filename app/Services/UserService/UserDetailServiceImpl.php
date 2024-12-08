<?php

namespace App\Services\UserService;


use App\Entities\Users\UserDetails;
use App\Entities\Users\UserMapper;
use App\Exceptions\BadCredentialException;
use App\Exceptions\DataNotFoundException;
use App\Models\Users\UserModel;
use App\Services\UserService\Interface\UserDetailService;


class UserDetailServiceImpl implements UserDetailService
{
    private UserModel $userModel;

    /**
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * @throws BadCredentialException
     */
    public function getUserDetails(string $email): UserDetails
    {
        $result = $this->userModel->isDataExist(null,$email);

        // when user not found
        if(!$result){
            throw new BadCredentialException('username or password are incorrect');
        }

        // getting data from database
        $result = $this->userModel->getUserDetails($email);

        // mapping result to an object
        $userMapper =  UserMapper::getUser($result);

        $userDetails = new UserDetails();
        $userDetails->setRole($userMapper->getRole());
        $userDetails->setId($userMapper->getId());
        $userDetails->setEmail($userMapper->getEmail());
        $userDetails->setPassword($userMapper->getPassword());
        $userDetails->setPrivileges($result['privileges']);
        $userDetails->setSuspend($result['suspend']);

        return $userDetails;
    }
}