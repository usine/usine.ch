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
        Venue::uploadLogo($request, $venue);

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
        $today = now()->startOfDay();
        $events = $venue->events->where('start', '>', $today)->sortBy('start');

        return view('venues.show', compact(['venue', 'events']));
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
        if ($request->removeLogo) {
            Venue::removeLogo($venue);
        } else {
            Venue::uploadLogo($request, $venue);
        }

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
