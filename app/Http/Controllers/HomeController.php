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

        $latestNews = News::orderBy('created_at', 'desc')->first();

        return view('home', compact('latestNews', 'events'));
    }
}
