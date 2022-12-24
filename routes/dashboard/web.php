<?php


use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\Client\OrderController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;


// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
//     function () {
//
//     });
    
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
        Route::get('/check',function(){
            return view('dashboard.welcome');
        });
        Route::get('/', [WelcomeController::class,'index'])->name('welcome');

        //category routes
        Route::resource('categories', CategoryController::class)->except(['show']);

        //product routes
        Route::resource('products', ProductController::class)->except(['show']);

        //client routes
        Route::resource('clients', ClientController::class)->except(['show']);
        Route::resource('clients.orders', OrderController::class)->except(['show']);

        //order routes
        Route::resource('orders', OrderController::class);
        Route::get('/orders/{order}/products', [OrderController::class,'products'])->name('orders.products');


        //user routes
        Route::resource('users', UserController::class)->except(['show']);

    });//end of dashboard routes

