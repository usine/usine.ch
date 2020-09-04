<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bla;
use App\Event;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::eventsAtDate(Carbon::today());

        $latestBla = Bla::orderBy('date', 'desc')->first();

        return view('home', compact('latestBla', 'events'));
    }
}
