<?php

namespace App\Http\Controllers\Growlogs;

use App\Http\Controllers\Controller;
use App\Models\Growlogs\GrowlogDay;
use App\Models\Growlogs\GrowlogDayText;
use App\Models\Growlogs\Growlog;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class GrowlogDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'entre';
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
    public function store(Request $request, Growlog $growlog )
    {
      //dd($request->date);
        $growlogDay = new GrowlogDay;
        $growlogDay->growlog_id = $growlog->id;
        $growlogDay->date = Carbon::createFromFormat('d/m/Y', $request->date);

        if($growlogDay->save())
        {
          //condicional de imagenes

          if($request->file('images'))
          {
            foreach ( $request->file('images') as $img) {

            }
          }

          //condicional de texto
          if($request->has('text'))
          {
            $growlogDayText = new GrowlogDayText;
            $growlogDayText->growlog_day_id = $growlogDay->id;
            $growlogDayText->content = $request->text;
            $growlogDayText->save();
          }




          Session::flash('success', 'Vitacora Actualizada!');
          return  redirect('/growlogs/'.$growlog->id);

        } else {

          Session::flash('warning', 'Seguimiento ya creado. Puedes editarlo AQUI');
          return  redirect('/growlogs/'.$growlog->id);
        }
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
