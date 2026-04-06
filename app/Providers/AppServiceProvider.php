<?php

namespace App\Providers;

use App\Models\BannerPhoto;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        View::composer('layouts.front', function ($view) {
            $services = Service::where('is_main', true)->where('is_active', true)->get();
            $logo = BannerPhoto::orderByDesc('id')->first();
            $contact = Contact::first();
            $view->with('services', $services);
            $view->with('logo', $logo);
            $view->with('contact', $contact);
        });
    }
}
