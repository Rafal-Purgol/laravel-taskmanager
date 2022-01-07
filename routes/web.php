<?php

use App\Http\Controllers\IsComController;
use App\Http\Controllers\IsDelController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::get('/completed', [IsComController::class, 'index'])->name('comindex');
Route::resource('task', TaskController::class);
Route::resource('task.complete', IsComController::class);
Route::resource('task.delete', IsDelController::class);
// Auth::routes();
// Route::get('/', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware(['auth:sanctum', 'verified'])->get('/task', function () {
    return view('index');
})->name('index');
