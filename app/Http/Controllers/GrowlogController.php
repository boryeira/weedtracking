<?php

namespace App\Http\Controllers;

use App\Models\Growlogs\Growlog;
use Illuminate\Http\Request;

class GrowlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('growlogs.index');
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
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function show(Growlog $growlog)
    {
      return view('growlogs.show')->with('growlog',$growlog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Growlog $growlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Growlog $growlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Growlog  $growlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Growlog $growlog)
    {
        //
    }
}
