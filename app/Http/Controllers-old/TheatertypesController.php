<?php

namespace App\Http\Controllers;

use App\Theatertype;
use Illuminate\Http\Request;

class TheatertypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theaters = Theatertype::all();
        return view('theater_type.list', compact('theaters'));
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
     * @param  \App\Theatertype  $theatertype
     * @return \Illuminate\Http\Response
     */
    public function show(Theatertype $theatertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theatertype  $theatertype
     * @return \Illuminate\Http\Response
     */
    public function edit(Theatertype $theatertype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theatertype  $theatertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theatertype $theatertype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theatertype  $theatertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theatertype $theatertype)
    {
        //
    }
}
