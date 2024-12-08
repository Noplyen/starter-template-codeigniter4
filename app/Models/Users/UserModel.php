<?php

namespace App\Models\Users;

use App\Entities\Users\Users;
use App\Exceptions\DataNotFoundException;
use App\Helpers\ResultModelHelper;
use App\Helpers\UserQueryHelper;
use CodeIgniter\Model;

class UserModel extends Model
{
    use UserQueryHelper;
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected array $casts = ["suspend"=>"boolean"];
    protected $allowedFields    =
        [
            "id",
            "email","password",
            "role_id","suspend"
        ];
    protected $DBGroup = "default";

    /**
     * @return array client
     * @throws DataNotFoundException
     */
    public function getAllData(): array
    {
        $result = $this
            ->selectBaseUser()
            ->selectRoles()
            ->user_join_role()
            ->findAll();

        ResultModelHelper::isResultEmpty($result,Users::class);

        return $result;
    }

    /**
     * Get user details, when you need a privileges user
     * @param string $email
     * @return array
     */
    public function getUserDetails(string $email): array
    {
        // get user data
        $resultUser      =
            $this->where('users.email',$email)
                ->selectBaseUser()
                ->selectRoles()
                ->user_join_role()
                ->first();

        // get user privileges
        $resultPrivilege = $this->where('users.email',$email)
            ->selectPrivilege()
            ->user_join_role()
            ->role_join_privilege()
            ->privilege_join_rolePrivilege()
            ->findAll();

        // format privileges into a simple array
        $privileges = array_map(function ($privilege) {
            return $privilege['privilege_name'];
        }, $resultPrivilege);

        // combine user data and privileges
        $data = [
            'user_id'   => $resultUser['user_id'],
            'password'  => $resultUser['password'],
            'email'     => $resultUser['email'],
            'role_id'   => $resultUser['role_id'],
            'role_name' => $resultUser['role_name'],
            'privileges'=> $privileges,
            'suspend'=>$resultUser['suspend']
        ];

        return $data;
    }

    public function getDataById($id)
    {
        $result = $this
            ->where('users.id',$id)
            ->selectBaseUser()
            ->selectRoles()
            ->user_join_role()
            ->first();

        ResultModelHelper::isResultEmpty($result,Users::class);

        return $result;
    }


    public function getDataByName(string $email)
    {
        $result = $this
            ->where('users.email',$email)
            ->selectBaseUser()
            ->selectRoles()
            ->user_join_role()
            ->first();

        ResultModelHelper::isResultEmpty($result,Users::class);

        return $result;
    }

    public function isDataExist($id = null, string $email = null): bool
    {
        $result = $this->where('email',$email)
            ->orWhere('id',$id)
            ->first();

        if(!(empty($result))){
            return true;
        }

        return false;
    }

    public function countData(): int
    {
        $result = $this->countAllResults();
        return $result;
    }
}