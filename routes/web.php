<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/cadastro', [UserController::class, 'index'])->name('cadastro');

Route::post('/cadastro', [UserController::class, 'store'])->name('cadastro');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/dashboard/{id}/{arquivo}', [DashboardController::class, 'destroy'])->name('dashboard/destroy')->middleware('auth');

Route::get('/dashboard/{arquivo}', [DashboardController::class, 'return_file'])->name('dashboard/file')->middleware('auth');





Route::get('/upload', [UploadController::class, 'index'])->name('upload')->middleware('auth');

Route::post('/upload', [UploadController::class, 'store'])->name('upload')->middleware('auth');

