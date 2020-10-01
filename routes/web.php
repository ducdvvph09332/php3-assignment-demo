<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('admin.dashboard.index');
});
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('home');
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user-index');
        Route::post('/status', [UserController::class, 'changeStatus'])->name('user-status');
        Route::get('/create', [UserController::class, 'create'])->name('user-create');
        Route::post('/store', [UserController::class, 'store'])->name('user-store');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user-destroy');
    });
});
