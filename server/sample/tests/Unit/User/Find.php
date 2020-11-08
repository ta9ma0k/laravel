<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class Find extends TestCase
{
    use RefreshDatabase;

    protected function setup(): void // <= voidを宣言しないとエラーになる
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'Database\Seeders\tests\Unit\User\FindSeeder']);
    }

    public function test_取得する()
    {
        $actual = User::all();
        $this->assertEquals(3, $actual->count());
    }

    public function test_メールアドレスで検索する()
    {
        $actual = User::where('email', 'like', 'hoge%')->get();
        $this->assertEquals(2, $actual->count());
    }
}
