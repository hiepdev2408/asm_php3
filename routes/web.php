<?php

use App\Http\Controllers\Auth\AutheticationController;
use App\Http\Controllers\Client\DisplayClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('client')
    ->as('client.')
    ->group(function () {
        Route::get('/', [DisplayClientController::class, 'index']);
        Route::get('{id}/detail', [DisplayClientController::class, 'detail_new'])->name('detail');

        Route::get('/loadAllPost', [DisplayClientController::class, 'loadAllPost'])->name('loadAllPost');
        Route::get('search/{id}', [DisplayClientController::class, 'search'])->name('search');
        Route::prefix('auth')
            ->as('auth.')
            ->group(function () {
                Route::get('login', [AutheticationController::class, 'showFormLogin'])->name('login');
                Route::post('login', [AutheticationController::class, 'login']);
                Route::post('logout', [AutheticationController::class, 'logout'])->name('logout');

                Route::get('register', [AutheticationController::class, 'showFormRegister'])->name('register');
                Route::post('register', [AutheticationController::class, 'register']);
            });
    });
