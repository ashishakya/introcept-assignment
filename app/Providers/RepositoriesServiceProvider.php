<?php

namespace App\Providers;

use App\Repositories\EmployeeRepository\EmployeeCsvRepository;
use App\Repositories\EmployeeRepository\EmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoriesServiceProvider
 * @package App\Providers
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeCsvRepository::class);
    }
}
