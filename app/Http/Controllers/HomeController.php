<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $events = Event::whereDate('start', Carbon::today())->orderBy('start')->orderBy('end')->get();
        foreach ($events as $event) {
            if ($event->end < $now) {
                $event->finished = true;
            }
        }

        return view('home', compact('events'));
    }
}
