<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\Translation\TranslationController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Hotel\HotelController;



include 'lang.php';

Route::prefix('{lang}')->where(['lang' => '[a-zA-Z]{2}'])->middleware([LangMiddleware::class])->group(function () {
    Route::view('/', 'welcome');
    Route::get('/lang/change', [LanguageController::class, 'changeLanguage'])->name('change.language');

    Route::resource('translations', TranslationController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('users', UserController::class);

    Route::get("/login", [LoginController::class, "showLoginForm"])->name("login");
    Route::post("/login", [LoginController::class, "login"]);
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");

    Route::get("/register", [RegisterController::class, "showRegistrationForm"])->name("register");
    Route::post("/register", [RegisterController::class, "register"]);

    Route::middleware("auth")->group(function () {
        Route::get("/profile", [ProfileController::class, "showProfileForm"])->name("profile");
        Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
        Route::get("/dashboard", [HomeController::class, "index"])->name("home");
    });
});
