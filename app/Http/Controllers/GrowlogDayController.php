<?php

namespace App\Http\Controllers;

use App\Models\Growlogs\GrowlogDay;
use Illuminate\Http\Request;

class GrowlogDayController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$nombre = $request->file('file')->getClientOriginalName();
      return response()->json([
          'respuesta' => 'wiipi ',
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function show(GrowlogDay $growlogDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function edit(GrowlogDay $growlogDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrowlogDay $growlogDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrowlogDay  $growlogDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrowlogDay $growlogDay)
    {
        //
    }
}
