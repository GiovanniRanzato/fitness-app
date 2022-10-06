<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecard_detailsRequest;
use App\Http\Requests\Updatecard_detailsRequest;
use App\Models\card_details;

class CardDetailsController extends Controller
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
     * @param  \App\Http\Requests\Storecard_detailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecard_detailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\card_details  $card_details
     * @return \Illuminate\Http\Response
     */
    public function show(card_details $card_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\card_details  $card_details
     * @return \Illuminate\Http\Response
     */
    public function edit(card_details $card_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecard_detailsRequest  $request
     * @param  \App\Models\card_details  $card_details
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecard_detailsRequest $request, card_details $card_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\card_details  $card_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(card_details $card_details)
    {
        //
    }
}
