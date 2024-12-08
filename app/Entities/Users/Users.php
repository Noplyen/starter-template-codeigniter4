<?php

namespace App\Entities\Users;

class Users
{
    private ?string $id;
    private string $password;
    private string $email;
    // eager join
    private Role $role;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function __serialize(): array
    {
       return [
         "id"=>$this->id,
         "email"=>$this->email,
         "role"=>$this->role->getName()
       ];
    }

    public function __unserialize(array $data): void
    {
        $role = new Role();
        $role->setName($data["role"]);

        $this->id   = $data["id"];
        $this->email= $data["email"];
        $this->role = $role;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role'=>$this->role->getName()
        ];
    }
}