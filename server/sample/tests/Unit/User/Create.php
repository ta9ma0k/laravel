<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Create extends TestCase
{
    use RefreshDatabase;

    public function test_登録できる()
    {
        $attributes = [
            'name'     => 'テスト太郎',
            'email'     => 'hoge@example.com',
            'password' => bcrypt('test'),
        ];

        User::create($attributes);
        $this->assertDatabaseHas('users', $attributes);
    }
}
