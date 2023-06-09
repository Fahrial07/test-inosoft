<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Vehicle\VehicleController;
use App\Http\Controllers\Motorcycle\MotorcycleController;

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

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'as' => 'api.auth.',
        'prefix' => 'auth',
    ],
    function () {
        Route::post('login', [AuthController::class, 'login'])
            ->name('login');

        Route::post('signup', [AuthController::class, 'signup'])
            ->name('signup');
    }
);

/*
|--------------------------------------------------------------------------
| Vehicle
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'as' => 'api.vehicle.',
        'prefix' => 'vehicle',
    ],
    function () {
        Route::get('', [VehicleController::class, 'index'])->middleware('jwt.verify')
            ->name('index');

        Route::post('store', [VehicleController::class, 'store'])->middleware('jwt.verify')
            ->name('store');

        Route::get('show', [VehicleController::class, 'show'])->middleware('jwt.verify')
            ->name('show');

        Route::post('update', [VehicleController::class, 'update'])->middleware('jwt.verify')
            ->name('update');

        Route::post('destroy', [VehicleController::class, 'destroy'])->middleware('jwt.verify')
            ->name('destroy');

        Route::get('get-stock', [VehicleController::class, 'getStock'])->middleware('jwt.verify')
            ->name('get-stock');
    }
);

/*
|--------------------------------------------------------------------------
| Car
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'as' => 'api.car.',
        'prefix' => 'car',
    ],
    function () {
        Route::get('', [CarController::class, 'index'])->middleware('jwt.verify')
            ->name('index');

        Route::post('store', [CarController::class, 'store'])->middleware('jwt.verify')
            ->name('store');

        Route::get('show', [CarController::class, 'show'])->middleware('jwt.verify')
            ->name('show');

        Route::post('update', [CarController::class, 'update'])->middleware('jwt.verify')
            ->name('update');

        Route::post('destroy', [CarController::class, 'destroy'])->middleware('jwt.verify')
            ->name('destroy');
    }
);

/*
|--------------------------------------------------------------------------
| Motorcycle
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'as' => 'api.motorcycle.',
        'prefix' => 'motorcycle',
    ],
    function () {
        Route::get('', [MotorcycleController::class, 'index'])->middleware('jwt.verify')
            ->name('index');

        Route::post('store', [MotorcycleController::class, 'store'])->middleware('jwt.verify')
            ->name('store');

        Route::get('show', [MotorcycleController::class, 'show'])->middleware('jwt.verify')
            ->name('show');

        Route::post('update', [MotorcycleController::class, 'update'])->middleware('jwt.verify')
            ->name('update');

        Route::post('destroy', [MotorcycleController::class, 'destroy'])->middleware('jwt.verify')
            ->name('destroy');
    }
);


