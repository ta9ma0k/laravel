<?php

namespace Tests\Unit\Dao;

use App\Domain\User\EmailAddress;
use App\Domain\User\UserDao;
use App\Infrastructure\Dao\UserDaoImpl;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserDaoTest extends TestCase
{
    use RefreshDatabase;
    private UserDao $sut;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'Database\Seeders\tests\Unit\User\FindSeeder']);
        $this->sut = new UserDaoImpl(new User());
    }

    public function test_findById()
    {
        $actual = $this->sut->findById(1);

        $this->assertEquals('Estell Grady', $actual->name());
        $this->assertEquals(new EmailAddress('hoge.1@example.com'), $actual->email());
    }
}
