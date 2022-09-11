<?php

namespace App\Providers;

use App\Http\Interfaces\DoctorInterface;
use App\Http\Repositories\DoctorRepository;
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
        $this->app->bind(DoctorInterface::class, DoctorRepository::class);
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
