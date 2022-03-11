<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use App\Http\Requests\StorePenugasanRequest;
use App\Http\Requests\UpdatePenugasanRequest;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePenugasanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenugasanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function show(Penugasan $penugasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penugasan $penugasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenugasanRequest  $request
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenugasanRequest $request, Penugasan $penugasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penugasan $penugasan)
    {
        //
    }
}
