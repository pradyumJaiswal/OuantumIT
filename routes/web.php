<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\conpanieController;
use App\http\Controllers\employeeController;
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


//-------------------------Admin Controller--------------------------------------//
Route::get('/', [AdminController::class, 'index'])->name('login');
Route::POST('/login', [AdminController::class, 'login'])->name('admin_login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['web','isAdmin']],function(){

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::resource('/Company',conpanieController::class);
Route::resource('/Employee',employeeController::class);
Route::get('/profile/{filename}', function ($filename) {
    $path = Storage::disk('private')->path($filename);

    if (!Storage::disk('private')->exists($filename)) {
        abort(404);
    }

    return response()->file($path);
})->name('profile.show');

});
