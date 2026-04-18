<?php

use App\Http\Controllers\AboutCompany\AboutCompanyController;
use App\Http\Controllers\AboutPageHeader\AboutPageHeaderController;
use App\Http\Controllers\AboutPageSkills\AboutPageSkillsController;
use App\Http\Controllers\AboutStatistic\AboutStatisticController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BannerPhoto\BannerPhotoController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Carousel\CarouselController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\ProcessSection\ProcessSectionController;
use App\Http\Controllers\Sertificate\SertificateController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\ServiceSection\ServiceSectionController;
use App\Http\Controllers\SkillsOption\SkillsOptionController;
use App\Http\Controllers\Statistic\StatisticController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Video\VideoController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\Translation\TranslationController;
use App\Http\Controllers\Language\LanguageController;

include 'lang.php';

Route::prefix('{lang}')->where(['lang' => '[a-zA-Z]{2,5}'])->middleware([LangMiddleware::class])->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/about', [IndexController::class, 'about'])->name('about');
    Route::get('/service', [IndexController::class, 'service'])->name('service');
    Route::get('/service/{slug}', [IndexController::class, 'serviceShow'])->name('service.show');
    Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [IndexController::class, 'blogShow'])->name('blog.show');
    Route::get('/team', [IndexController::class, 'team'])->name('team');
    Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

    Route::get('/lang/change', [LanguageController::class, 'changeLanguage'])->name('change.language');
    Route::get("/admin", [LoginController::class, "showLoginForm"])->name("login");
    Route::post("/login", [LoginController::class, "login"])->name("login.post");


    Route::middleware("role:admin")->group(function () {

        Route::resource('users', UserController::class);
    });

    Route::middleware("role:admin,user")->group(function () {

        Route::get('/history/{model}/{id}', [HistoryController::class, 'show'])->name('history.show');
        Route::get("/profile", [ProfileController::class, "showProfileForm"])->name("profile");
        Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
        Route::post("/logout", [LoginController::class, "logout"])->name("logout");

        Route::resource('languages', LanguageController::class);
        Route::resource('translations', TranslationController::class);
        Route::resource('carousels', CarouselController::class);
        Route::resource('aboutcompanies', AboutCompanyController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('servicesections', ServiceSectionController::class);
        Route::resource('processsections', ProcessSectionController::class);
        Route::resource('portfolios', PortfolioController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('statistics', StatisticController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('contacts', ContactController::class);

        Route::resource('aboutpageheaders', AboutPageHeaderController::class);
        Route::resource('aboutstatistics', AboutStatisticController::class);
        Route::resource('aboutpageskills', AboutPageSkillsController::class);
        Route::resource('skillsoptions', SkillsOptionController::class);
        Route::resource('sertificates', SertificateController::class);
        Route::resource('bannerphotos', BannerPhotoController::class);
        Route::resource('videos', VideoController::class);
    });
});
