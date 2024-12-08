<?php

namespace App\Helpers;

trait UserQueryHelper
{
    public function selectBaseUser()
    {
        return $this->select('users.id as user_id , users.email as email , users.password as password , users.suspend as suspend',true);
    }

    public function selectRoles()
    {
        return $this->select('roles.name as role_name , roles.id as role_id',true);
    }

    public function selectPrivilege()
    {
        return $this->select('privileges.name as privilege_name');
    }

    public function user_join_role()
    {
        return $this->join('roles','roles.id = users.role_id');
    }

    public function privilege_join_rolePrivilege()
    {
        return $this->join('privileges','privileges.id = role_privileges.privilege_id');
    }
    public function role_join_privilege()
    {
        return $this->join('role_privileges','role_privileges.role_id = roles.id');

    }
}