<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogDay;


class GrowlogDayController extends ApiController
{
  public function index(Growlog $growlog)
  {
    $day = $growlog->days;

    return $this->showAll($day,200);
  }

  public function store(Request $request)
  {

    return response()->json([
        'date' => $request->date,
        'text' => $request->text,
    ], 200);
  }

  public function show(Growlog $growlog, GrowlogDay $day)
  {
    return $this->showOne($day,200);
  }

  public function update(Request $request, Growlog $growlog, GrowlogDay $day)
  {
    $day->date = $request->date;
    $day->save();
  //  return  $request->date;
    return 'listo';
  }


}
