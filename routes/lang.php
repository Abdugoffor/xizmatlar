<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $lang = session('lang') ?: config('app.locale');

    $langs = getLanguage()->pluck('name')->toArray();

    if (!in_array($lang, $langs, true)) {
        $lang = $langs[0] ?? config('app.locale');
    }

    return redirect()->to("/{$lang}");
})->name('root');

?>