<?php

declare(strict_types=1);

namespace App\Infrastructure\Dao;

use App\Domain\User\EmailAddress;
use App\Domain\User\User;
use App\Domain\User\UserDao;
use App\Models\User as EUser;

class UserDaoImpl implements UserDao
{
    public function findById(int $id): User
    {
        $result = EUser::findOrFail($id);
        return new User($result->name, new EmailAddress($result->email));
    }
}
