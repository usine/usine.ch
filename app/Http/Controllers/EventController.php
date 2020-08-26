<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

        $eventsToday = Event::whereDate('start', Carbon::today())->orderBy('start')->orderBy('end')->get();
        foreach ($eventsToday as $event) {
            if ($event->end < $now) {
                $event->finished = true;
            }
        }

        $eventsTomorrow = Event::whereDate('start', Carbon::tomorrow())->orderBy('start')->orderBy('end')->get();
        $eventsDayAfterTomorrow = Event::whereDate('start', Carbon::tomorrow()->addDay())->orderBy('start')->orderBy('end')->get();
        $eventsDayAfterAfterTomorrow = Event::whereDate('start', Carbon::tomorrow()->addDays(2))->orderBy('start')->orderBy('end')->get();

        return view('events.index', compact(['eventsToday', 'eventsTomorrow', 'eventsDayAfterTomorrow', 'eventsDayAfterAfterTomorrow']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
