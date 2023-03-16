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

    

    
    Route::group( [ 'namespace' => 'App\Http\Controllers\Palette\Production' ], function() {
        Route::resource('palette.production', PaletteController::class)->parameters( [
            'palette' => 'production'
        ]);
    });

    Route::group( [ 'namespace' => 'App\Http\Controllers\Carton\Production' ], function() {
        Route::resource('carton.production', CartonController::class)->parameters( [
            'carton' => 'production'
        ]);
    });

    Route::get('/batch/production/summary', [ App\Http\Controllers\Batch\Production\BatchController::class, 'batchProductionSummary'])->name('batch.production.summary');

    Route::group( [ 'namespace' => 'App\Http\Controllers\Batch\Production' ], function() {
        Route::resource('batch.production', BatchController::class)->parameters( [
            'batch' => 'production'
        ]);
    });

    Route::group( [ 'namespace' => 'App\Http\Controllers\Batch\Registration' ], function() {
        Route::resource('batch.registration', BatchController::class)->parameters( [
            'batch' => 'registration'
        ]);
    });

    Route::get('racking/{palette}', function ($palette) {
        return view('batch.racking', [ 'palette_id' => $palette ]);
    })->name('racking.palette');

    Route::get('racking', function () {
        return view('batch.racking');
    })->name('racking');


});


// Batch API
Route::get('batches', [App\Http\Controllers\BatchController::class, 'getPreProdAll'])->name('batch.pre-prod.all');
Route::get('palette/scan/start/{uuid}', [App\Http\Controllers\Palette\Production\PaletteController::class, 'paletteScanStart'])->name('palette.scan.start');
Route::get('palette/scan/end/{uuid}', [App\Http\Controllers\Palette\Production\PaletteController::class, 'paletteScanEnd'])->name('palette.scan.end');
Route::get('carton/scan/start/{uuid}', [App\Http\Controllers\Carton\Production\CartonController::class, 'cartonScanStart'])->name('carton.scan.start');
Route::get('carton/scan/end/{uuid}', [App\Http\Controllers\Carton\Production\CartonController::class, 'cartonScanEnd'])->name('carton.scan.end');

