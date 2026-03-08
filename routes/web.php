<?php

use App\Http\Controllers\AboutCompany\AboutCompanyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Carousel\CarouselController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\ProcessSection\ProcessSectionController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\ServiceSection\ServiceSectionController;
use App\Http\Controllers\Statistic\StatisticController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\Translation\TranslationController;
use App\Http\Controllers\Language\LanguageController;



include 'lang.php';

Route::prefix('{lang}')->where(['lang' => '[a-zA-Z]{2}'])->middleware([LangMiddleware::class])->group(function () {
    Route::view('/', 'welcome');
    Route::get('/lang/change', [LanguageController::class, 'changeLanguage'])->name('change.language');
    Route::resource('languages', LanguageController::class);

    Route::get("/login", [LoginController::class, "showLoginForm"])->name("login");
    Route::post("/login", [LoginController::class, "login"]);
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");

    Route::get("/register", [RegisterController::class, "showRegistrationForm"])->name("register");
    Route::post("/register", [RegisterController::class, "register"]);

    Route::middleware("role:user")->group(function () {

        Route::get("/profile", [ProfileController::class, "showProfileForm"])->name("profile");
        Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
        Route::get("/dashboard", [HomeController::class, "index"])->name("home");

    });

    Route::resource('translations', TranslationController::class);
    Route::resource('carousels', CarouselController::class);
    Route::resource('aboutcompanies', AboutCompanyController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('users', UserController::class);
    Route::resource('servicesections', ServiceSectionController::class);
    Route::resource('processsections', ProcessSectionController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('statistics', StatisticController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('contacts', ContactController::class);
});
