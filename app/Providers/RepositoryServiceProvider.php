<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\UserService;
use App\Services\PostService;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);

        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
    }

    public function boot()
    {
        //
    }
} 