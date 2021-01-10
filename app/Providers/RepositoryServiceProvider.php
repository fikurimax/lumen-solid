<?php

namespace App\Providers;

use App\Repository\TodoRepo;
use App\Repository\TodoRepoImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // register the interface class for dependency injection
        $this->app->bind(TodoRepoImpl::class, TodoRepo::class);
    }
}
