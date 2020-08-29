<?php

namespace App\Http\Controllers;

use App\Bla;
use Illuminate\Http\Request;

class BlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blas = Bla::orderBy('date', 'desc')->get();

        return view('blas.index', compact('blas'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bla  $bla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bla $bla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bla  $bla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bla $bla)
    {
        //
    }
}
