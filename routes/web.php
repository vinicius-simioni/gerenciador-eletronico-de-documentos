<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ShareController;
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

Route::get('/', function () { return view('cadastro'); });

Route::get('/cadastro', [UserController::class, 'index'])->name('cadastro');
Route::post('/cadastro', [UserController::class, 'store'])->name('cadastro');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/dashboard', [DashboardController::class, 'filteredIndex'])->name('filteredIndex')->middleware('auth');
Route::get('/dashboard/shared', [DashboardController::class, 'shared_index'])->name('dashboard/shared')->middleware('auth');
Route::post('/dashboard/shared', [DashboardController::class, 'filteredSharedIndex'])->name('filteredSharedIndex')->middleware('auth');
Route::get('/dashboard/sharedWith', [DashboardController::class, 'sharedWith'])->name('sharedWith')->middleware('auth');
Route::post('/dashboard/sharedUpdate', [DashboardController::class, 'sharedUpdate'])->name('sharedUpdate')->middleware('auth');
Route::post('/dashboard/filteredSharedWith', [DashboardController::class, 'filteredSharedWith'])->name('filteredSharedWith')->middleware('auth');
Route::get('/dashboard/{id}/{name}', [DashboardController::class, 'destroy'])->name('dashboard/destroy')->middleware('auth');
Route::delete('/dashboard/finalDestroy', [DashboardController::class, 'finalDestroy'])->name('dashboard/finalDestroy')->middleware('auth');
Route::get('/dashboard/file/{id}/{name}', [DashboardController::class, 'return_file'])->name('dashboard/file')->middleware('auth');

Route::get('/upload', [UploadController::class, 'index'])->name('upload')->middleware('auth');
Route::post('/upload', [UploadController::class, 'store'])->name('upload')->middleware('auth');

Route::get('/share/{id}', [ShareController::class, 'index'])->name('share')->middleware('auth');
Route::get('/share/remove/{id}', [ShareController::class, 'shareDelete'])->name('share/destroy')->middleware('auth');
Route::get('/share/user/remove/{id}', [ShareController::class, 'shareDeleteUser'])->name('share/user/destroy')->middleware('auth');
Route::post('/share/store', [ShareController::class, 'store'])->name('share/store')->middleware('auth');
Route::post('/share/edit', [ShareController::class, 'update'])->name('share/edit')->middleware('auth');
Route::post('/share/read', [ShareController::class, 'show'])->name('share/read')->middleware('auth');
Route::delete('/share/delete', [ShareController::class, 'destroy'])->name('share/delete')->middleware('auth');
Route::post('/share/{name?}', [ShareController::class, 'get_names'])->name('share/get_names')->middleware('auth');

Route::get('/editor', [EditorController::class, 'index'])->name('editor')->middleware('auth');
Route::get('/editor/{id}', [EditorController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/show', [EditorController::class, 'show'])->name('show')->middleware('auth');