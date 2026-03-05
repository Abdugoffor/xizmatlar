<?php

use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Translation\TranslationController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Hotel\HotelController;



Route::middleware(LangMiddleware::class)->group(function () {
    Route::get('/lang/{lang}', [LanguageController::class, 'changeLanguage'])->name('change.language');
    Route::resource('translations', TranslationController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('hotels', HotelController::class);
});
