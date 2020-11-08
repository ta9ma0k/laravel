<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserDao
{
    public function findById(int $id): User;
}
