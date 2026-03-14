<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Comment;
use App\Models\Portfolio;
use App\Models\ProcessSection;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\Statistic;

class IndexController extends Controller
{
    public function index()
    {
        $carousels = Carousel::where('is_active', true)->orderBy('id', 'desc')->limit(10)->get();

        $aboutCompany = AboutCompany::first();

        $services = Service::where('is_main', true)->limit(4)->get();

        $serviceSections = ServiceSection::first();

        $progresSections = ProcessSection::orderBy('order', 'asc')->limit(4)->get();

        $portfolios = Portfolio::where('is_active', true)->orderBy('id', 'desc')->limit(15)->get();

        $comments = Comment::where('is_active', true)->orderBy('id', 'desc')->limit(3)->get();
        $statistics = Statistic::where('is_active', true)->orderBy('id', 'desc')->limit(4)->get();

        $blogs = Blog::where('is_active', true)->orderBy('id', 'desc')->limit(3)->get();

        return view('front.home.index', [
            'carousels' => $carousels,
            'aboutCompany' => $aboutCompany,
            'services' => $services,
            'serviceSections' => $serviceSections,
            'progresSections' => $progresSections,
            'portfolios' => $portfolios,
            'comments' => $comments,
            'statistics' => $statistics,
            'blogs' => $blogs
        ]);
    }
}
