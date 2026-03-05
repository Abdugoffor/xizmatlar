<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\Translation\TranslationController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Hotel\HotelController;

Route::get('/', function () {

    $lang = session('lang') ?: config('app.locale');

    $langs = getLanguage()->pluck('name')->toArray();

    if (!in_array($lang, $langs, true)) {
        $lang = $langs[0] ?? config('app.locale');
    }

    return redirect()->to("/{$lang}");
})->name('root');


Route::prefix('{lang}')->middleware([LangMiddleware::class])->group(function () {
    Route::view('/', 'welcome');
    Route::get('/lang/change', [LanguageController::class, 'changeLanguage'])->name('change.language');

    Route::resource('translations', TranslationController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('hotels', HotelController::class);
});
