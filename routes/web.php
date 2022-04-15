<?php

use App\TestFacade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;




Route::resource('/posts',PostController::class);

Route::get('logout',[AuthController::class, 'logout']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[PostController::class, 'index'] );
});

//Container
Route::get('/', function (){
    return TestFacade::greet();
});


