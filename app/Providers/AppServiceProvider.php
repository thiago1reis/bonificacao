<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Movement;
use App\Repositories\EmployeeRepository;
use App\Repositories\MovementRepository;
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
        
        $this->app->bind('App\Repositories\Interfaces\MovementRepositoryInterface', 'App\Repositories\MovementRepository');

        $this->app->bind('App\Repositories\Interfaces\MovementRepositoryInterface', function(){
            return new MovementRepository(new Movement());
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
