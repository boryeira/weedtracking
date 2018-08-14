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

  public function show(Growlog $growlog, GrowlogDay $day)
  {
    return $this->showOne($day,200);
  }
}
