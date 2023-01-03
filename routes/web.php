<?php

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


Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('admin', App\Http\Controllers\AdminController::class);

    Route::resource('staff', App\Http\Controllers\StaffController::class);

    Route::resource('brand-owner', App\Http\Controllers\BrandOwnerController::class);

    Route::resource('product', App\Http\Controllers\ProductController::class);

    Route::resource('unit', App\Http\Controllers\UnitController::class);

    Route::resource('bundle', App\Http\Controllers\BundleController::class);

    Route::resource('carton', App\Http\Controllers\CartonController::class);

    Route::resource('palette', App\Http\Controllers\PaletteController::class);

    Route::resource('batch', App\Http\Controllers\BatchController::class);

    Route::get('racking/{palette}', function ($palette) {
        return view('batch.racking', [ 'palette_id' => $palette ]);
    })->name('racking.palette');

    Route::get('racking', function () {
        return view('batch.racking');
    })->name('racking');


});


