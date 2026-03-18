<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use App\Models\AboutPageHeader;
use App\Models\AboutPageSkills;
use App\Models\AboutStatistic;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\ProcessSection;
use App\Models\Sertificate;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\SkillsOption;
use App\Models\Statistic;
use App\Models\Team;

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

    public function about()
    {
        $aboutCompany = AboutPageHeader::first();
        $aboutPageSkills = AboutPageSkills::first();
        $aboutStatistic = AboutStatistic::limit(4)->get();
        $skillsOptions = SkillsOption::all();
        $teams = Team::where('is_active', true)->get();
        $comments = Comment::where('is_active', true)->orderBy('id', 'desc')->get();
        $clients = Client::where('is_active', true)->orderBy('id', 'desc')->get();

        return view('front.about.index', [
            'aboutCompany' => $aboutCompany,
            'aboutStatistics' => $aboutStatistic,
            'aboutPageSkills' => $aboutPageSkills,
            'skillsOptions' => $skillsOptions,
            'teams' => $teams,
            'comments' => $comments,
            'clients' => $clients
        ]);
    }

    public function service()
    {
        $clients = Client::where('is_active', true)->get();
        $services = Service::where('is_active', true)->paginate(9);
        return view('front.services.index', ['services' => $services, 'clients' => $clients]);
    }
    public function serviceShow($lang, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $servicesSections = Service::where('is_active', true)->orderBy('id', 'desc')->limit(9)->get();
        $sertificates = Sertificate::all();
        return view('front.services.show', ['service' => $service, 'servicesSections' => $servicesSections, 'sertificates' => $sertificates]);
    }
    public function blog()
    {
        $blogs = Blog::where('is_active', true)->orderBy('id', 'desc')->paginate(9);
        $blogsSections = Blog::where('is_active', true)->orderBy('id', 'desc')->limit(10)->get()->shuffle()->take(5);
        return view('front.blog.index', ['blogs' => $blogs, 'blogsSections' => $blogsSections]);
    }
    public function blogShow($lang, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blogsSections = Blog::where('is_active', true)->orderBy('id', 'desc')->limit(10)->get()->shuffle()->take(5);
        return view('front.blog.show', ['blog' => $blog, 'blogsSections' => $blogsSections]);
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('front.contact.index', ['contact' => $contact]);
    }
}
