<?php

use App\Http\Controllers\AuthController\AdminAuthController;
use App\Http\Controllers\webController\webController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AdminAuthController::class, "showLoginForm"])->name("admin.login");

Route::post("/login",[AdminAuthController::class,"login"])->name("admin.auth");

Route::middleware(["auth:admin"])->group((function(){

    Route::get("/home",[webController::class,"home"])->name("home.page");

}));
