<?php

use App\Http\Controllers\{LoginController, AdminController, EmployeeController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rota inicial
Route::view('/', 'login')->name('home');

//Rotas de login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/check-auth', [LoginController::class, 'checkAuth'])->name('check.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Rotas do admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    
    //Rota do painel admin
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    
    //Rotas de funcionárois
    Route::get('/funcionarios', [EmployeeController::class, 'index'])->name('employee.index');
    Route::any('/funcionarios/busca', [EmployeeController::class, 'search'])->name('employee.search');
    Route::get('/funcionario/registrar', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/funcionario/registrar', [EmployeeController::class, 'store'])->name('employee.store');
    
  
});