<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecardsRequest;
use App\Http\Requests\UpdatecardsRequest;
use App\Models\cards;

class CardsController extends Controller
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
     * @param  \App\Http\Requests\StorecardsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecardsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function show(cards $cards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function edit(cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecardsRequest  $request
     * @param  \App\Models\cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecardsRequest $request, cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function destroy(cards $cards)
    {
        //
    }
}
