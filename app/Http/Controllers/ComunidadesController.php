<?php

namespace App\Http\Controllers;

use App\Models\Comunidades;
use Illuminate\Http\Request;

class ComunidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response("hola");
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
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidades $comunidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidades $comunidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunidades $comunidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidades $comunidades)
    {
        //
    }
}
