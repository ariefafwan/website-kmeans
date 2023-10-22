<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\KmeansController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    //home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    //kmeans
    Route::get('/data', [AdminController::class, 'data'])->name('data.index');
    Route::post('/data', [AdminController::class, 'storedata'])->name('data.store');
    Route::get('/edit/{id}', [AdminController::class, 'editdata'])->name('data.edit');
    Route::post('/update', [AdminController::class, 'updatedata'])->name('data.update');
    Route::post('/destroydata/{id}', [AdminController::class, 'destroydata'])->name('data.destroy');
    Route::get('/kmeans/get', [KmeansController::class, 'kmeans'])->name('kmeans.index');

    Route::get('/desa', [AdminController::class, 'desa'])->name('desa.index');
    Route::get('/desa/{id}/edit', [AdminController::class, 'editdesa'])->name('desa.edit');
    Route::post('/desa', [AdminController::class, 'storedesa'])->name('desa.store');
    Route::post('/desa/update', [AdminController::class, 'updatedesa'])->name('desa.update');
    Route::post('/desa/destroy/{id}', [AdminController::class, 'destroydesa'])->name('desa.destroy');

    Route::get('/cluster', [AdminController::class, 'cluster'])->name('cluster.index');
    Route::get('/cluster/{id}/edit', [AdminController::class, 'editcluster'])->name('cluster.edit');
    Route::post('/cluster', [AdminController::class, 'storecluster'])->name('cluster.store');
    Route::post('/cluster/update', [AdminController::class, 'updatecluster'])->name('cluster.update');
    Route::post('/cluster/destroy/{id}', [AdminController::class, 'destroycluster'])->name('cluster.destroy');

    Route::get('/test', [AdminController::class, 'test'])->name('test');

    Route::get('/resourcedata', [AdminController::class, 'resourcedata'])->name('resource.data');
});
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
