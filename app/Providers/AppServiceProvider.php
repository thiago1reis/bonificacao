<?php

namespace App\Providers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
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
       $this->app->bind('App\Repositories\Interfaces\EmployeeRepositoryInterface', 'App\Repositories\EmployeeRepository');

       $this->app->bind('App\Repositories\Interfaces\EmployeeRepositoryInterface', function(){
            return new EmployeeRepository(new Employee());
       });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
