<?php

namespace App\Entities\Users;

class UserDetails extends Users
{
    private array $privileges;
    private bool $suspend;

    public function isSuspend(): bool
    {
        return $this->suspend;
    }

    public function setSuspend(bool $suspend): void
    {
        $this->suspend = $suspend;
    }

    public function getPrivileges(): array
    {
        return $this->privileges;
    }

    public function setPrivileges(array $privileges): void
    {
        $this->privileges = $privileges;
    }
}