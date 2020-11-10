<?php

namespace App\Http\Controllers;

use App\Event;
use App\Venue;
use App\Http\Requests\VenueRequest;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Venue::class, 'venue');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::orderBy('name')->get();

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VenueRequest $request)
    {
        $venue = Venue::create($request->validated());

        return redirect()->route('venues.show', compact('venue'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Venue $venue)
    {
        [
            $date,
            $eventsAtDate,
            $eventsAtDatePlus1,
            $eventsAtDatePlus2
        ] = Event::eventsForThreeDays($request->query('date'), $venue->id);

        return view('venues.show', compact(['venue', 'date', 'eventsAtDate', 'eventsAtDatePlus1', 'eventsAtDatePlus2']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(VenueRequest $request, Venue $venue)
    {
        $venue->update($request->validated());

        return redirect()->route('venues.show', compact('venue'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
