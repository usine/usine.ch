<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\Event;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::eventsAtDate(Carbon::today());

        $latestNews = News::published()->orderBy('publication_date', 'desc')->first();

        return view('home', compact('latestNews', 'events'));
    }
}
