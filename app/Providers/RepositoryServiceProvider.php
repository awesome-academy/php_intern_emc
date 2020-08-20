<?php

namespace App\Providers;

use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\RateRepository;
use App\Repositories\Eloquent\RequestProductRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\RateRepositoryInterface;
use App\Repositories\Interfaces\RequestProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestProductRepositoryInterface::class, RequestProductRepository::class);
        $this->app->bind(RateRepositoryInterface::class,RateRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
