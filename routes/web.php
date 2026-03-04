<?php

use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('{lang}')->middleware(LangMiddleware::class)->group(function () {

    Route::resource('translations', App\Http\Controllers\Translation\TranslationController::class);
    Route::resource('languages', App\Http\Controllers\Language\LanguageController::class);
    Route::resource('hotels', App\Http\Controllers\Hotel\HotelController::class);
});

Route::get('/lang/{lang}', [App\Http\Controllers\Language\LanguageController::class, 'changeLanguage'])->name('change.language');