<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use App\Models\Growlogs\Growlog;

class GrowlogDayController extends ApiController
{
  public function index(Growlog $growlog)
  {
    $day = $growlog->days;
    dd($day);
  }
}
