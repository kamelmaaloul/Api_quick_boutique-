<?php

use App\Http\Controllers\Api\V1\Admin\CategoryController;
use App\Http\Controllers\Api\V1\Admin\OrderController;
use App\Http\Controllers\Api\V1\Admin\OrderDetailController;
use App\Http\Controllers\Api\V1\Admin\ProductController;
use App\Http\Controllers\Api\V1\Admin\UserController;
use App\Http\Controllers\Api\V1\AuthController;
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
    Route::name('auth.')->group(function(){
        Route::post('register',[AuthController::class,'register'])->name('register');
        Route::post('login',[AuthController::class,'login'])->name('login');
        Route::post('logout',[AuthController::class,'logout'])->middleware(['auth:sanctum'])->name('logout');

    });
    

    // Route auth
    Route::middleware(['auth:sanctum' , 'check_user_active'])->group(function(){

        // route Admin

        Route::middleware(['check_user_type:admin'])->group(function(){
            Route::apiResource('users',UserController::class);
            Route::apiResource('categories',CategoryController::class);
            Route::apiResource('products',ProductController::class);
            Route::apiResource('orders',OrderController::class);
            Route::apiResource('orders.detail',OrderDetailController::class);

        });

        //routes Users

        Route::middleware(['check_user_type:user'])->group(function(){
        });


       
    });
