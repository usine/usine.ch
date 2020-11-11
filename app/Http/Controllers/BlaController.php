<?php

namespace App\Http\Controllers;

use App\Bla;
use App\Http\Requests\BlaRequest;
use Illuminate\Http\Request;

class BlaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Bla::class, 'bla');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blas = Bla::orderBy('created_at', 'desc')->get();

        return view('blas.index', compact('blas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlaRequest $request)
    {
        $bla = Bla::create($request->validated());

        return redirect()->route('blas.show', compact('bla'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bla  $bla
     * @return \Illuminate\Http\Response
     */
    public function show(Bla $bla)
    {
        return view('blas.show', compact('bla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bla  $bla
     * @return \Illuminate\Http\Response
     */
    public function edit(Bla $bla)
    {
        return view('blas.edit', compact('bla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bla  $bla
     * @return \Illuminate\Http\Response
     */
    public function update(BlaRequest $request, Bla $bla)
    {
        $bla->update($request->validated());

        return redirect()->route('blas.show', compact('bla'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bla  $bla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bla $bla)
    {
        $bla->delete();

        return redirect()->route('blas.index');
    }
}
