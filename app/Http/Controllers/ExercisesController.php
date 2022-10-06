<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreexercisesRequest;
use App\Http\Requests\UpdateexercisesRequest;
use App\Models\exercises;

class ExercisesController extends Controller
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
     * @param  \App\Http\Requests\StoreexercisesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexercisesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    public function show(exercises $exercises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    public function edit(exercises $exercises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexercisesRequest  $request
     * @param  \App\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateexercisesRequest $request, exercises $exercises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    public function destroy(exercises $exercises)
    {
        //
    }
}
