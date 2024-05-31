<?php

namespace App\Providers;

use App\Interface\Repository\ProductRepositoryInterface;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Service\AuthenticationServiceInterface;
use App\Interface\Service\ProductServiceInterface;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use App\Service\AuthenticationService;
use App\Service\ProductService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(AuthenticationServiceInterface::class, AuthenticationService::class);
    }


    public function boot(): void
    {
        //
    }
}
