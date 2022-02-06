<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/package', [ App\Http\Controllers\API\PackageController::class, 'index'])->name('api.package.index');
Route::get('/package/{id}', [App\Http\Controllers\API\PackageController::class, 'show'])->name('api.package.show');
Route::post('/package', [App\Http\Controllers\API\PackageController::class, 'store'])->name('api.package.store');
Route::put( '/package/{id}', [App\Http\Controllers\API\PackageController::class, 'update'])->name('api.package.update');
Route::patch('/package/{id}', [App\Http\Controllers\API\PackageController::class, 'updatePartial'])->name('api.package.updatePartial');
Route::delete('/package/{id}', [App\Http\Controllers\API\PackageController::class, 'destroy'])->name('api.package.destroy');
