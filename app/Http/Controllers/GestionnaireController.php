<?php

namespace App\Http\Controllers;

use App\Gestionnaire;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class gestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('gestionnaires.index');
    }


    public function list(Request $request)
    {
        $gestionnaires=gestionnaire::get()->load(['user']);
        return Datatables::of($gestionnaires)->make(true);
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
     * @param  \App\gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(gestionnaire $gestionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(gestionnaire $gestionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gestionnaire $gestionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(gestionnaire $gestionnaire)
    {
        //
    }
}
