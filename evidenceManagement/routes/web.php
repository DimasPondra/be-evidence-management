<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageEvidenceController;
use App\Http\Controllers\DetailEvidenceController;
use App\Http\Controllers\CriteriaEvidenceController;
use App\Http\Controllers\RegisterEvidenceController;
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

// Homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::prefix('dashboard')
    ->middleware(['auth:sanctum'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/register-evidence', RegisterEvidenceController::class);

        Route::resource('/criteria-evidence', CriteriaEvidenceController::class);

        Route::resource('/detail-evidence', DetailEvidenceController::class);

        Route::resource('/image-evidence', ImageEvidenceController::class);
    });
