<?php

namespace App\Providers;

use App\Domain\User\UserDao;
use App\Infrastructure\Dao\UserDaoImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->singleton(UserDao::class, fn ($app) => $app->make(UserDaoImpl::class));
    }
}
