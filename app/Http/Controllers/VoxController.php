<?php

namespace App\Http\Controllers;

use App\Vox;
use App\Http\Requests\VoxRequest;
use Illuminate\Http\Request;

class VoxController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Vox::class, 'vox');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voxs = Vox::orderBy('date', 'desc')->get()->groupBy('year');

        return view('vox.index', compact('voxs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vox.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoxRequest $request)
    {
        $vox = Vox::create($request->validated());
        Vox::uploadVox($request, $vox);
        Vox::uploadMiniature($request, $vox);

        return redirect()->route('vox.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vox  $vox
     * @return \Illuminate\Http\Response
     */
    public function show(Vox $vox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vox  $vox
     * @return \Illuminate\Http\Response
     */
    public function edit(Vox $vox)
    {
        return view('vox.edit', compact('vox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vox  $vox
     * @return \Illuminate\Http\Response
     */
    public function update(VoxRequest $request, Vox $vox)
    {
        $vox->update($request->validated());
        Vox::uploadVox($request, $vox);
        Vox::uploadMiniature($request, $vox);

        return redirect()->route('vox.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vox  $vox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vox $vox)
    {
        $vox->delete();

        return redirect()->route('vox.index');
    }
}
