<?php

declare(strict_types=1);

namespace App\Domain\User;

class User
{
    private string $name;
    private EmailAddress $email;

    public function __construct(string $name, EmailAddress $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): EmailAddress
    {
        return $this->email;
    }
}
