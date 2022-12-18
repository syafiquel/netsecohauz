<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Admin;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Log;


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
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {

//     Route::get('/dashboard', function () {
//         Log::debug('logged');
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/dashboard', function () {
    return view('partials.dashboard');
})->name('dashboard');


Route::get('user/admin', function () {
    return view('admin.create');
})->name('admin.create');

Route::get('user/client', function () {
    return view('client.index');
})->name('client.index');

Route::get('user/client/create', function () {
    return view('client.create');
})->name('client.create');

Route::post('/register/create', [AuthController::class, 'store'])
    ->middleware([config('jetstream.auth_session')])
    ->name('register.create');

