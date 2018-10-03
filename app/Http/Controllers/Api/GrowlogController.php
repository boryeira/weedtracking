<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogDay;


class GrowlogController extends ApiController
{
  public function index()
  {
    $growlog = Growlog::orderBy('updated_at','desc')->get();

    return $this->showAll($growlog,200);
  }

  public function show(Growlog $growlog)
  {
    return $this->showOne($growlog,200);
  }
  public function days()
  {
      $growlogDays =  GrowlogDay::orderBy('updated_at','desc')->get();
      return $this->showAll($growlogDays,200);
  }

}
