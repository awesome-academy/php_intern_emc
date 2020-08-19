<?php

namespace App\Providers;

use App\Repositories\Eloquent\RequestProductRepository;
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
