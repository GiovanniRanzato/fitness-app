<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCardDetailRequest;
use App\Http\Requests\V1\UpdateCardDetailRequest;
use App\Models\CardDetail;

class CardDetailController extends Controller
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
     * @param  \App\Http\Requests\V1\StoreCardDetailRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardDetail  $model
     * @return \Illuminate\Http\Response
     */
    public function show(CardDetail $model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardDetail  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(CardDetail $model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\V1\UpdateCardDetailRequest  $request
     * @param  \App\Models\CardDetails  $model
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardDetailRequest $request, CardDetail $model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\card_details  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardDetail $model)
    {
        //
    }
}
