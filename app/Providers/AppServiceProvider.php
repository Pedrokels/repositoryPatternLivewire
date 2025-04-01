<?php

namespace App\Providers;

use App\Repositories\TaskRepositoryInterface;
use App\Repositories\TasksRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TasksRepository::class);
    }

    public function boot()
    {
        //
    }
}
