<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogDay;
use App\Models\Growlogs\GrowlogDayImage;

class GrowlogDayImageController extends ApiController
{
  public function index(Growlog $growlog)
  {
    //$images = GrowlogDayImage::all();

    $images = $growlog->images;
    return $this->showAll($images);
    // return response()->json(['data' => $companies]);
  }

  public function show(Growlog $growlog, GrowlogDayImage $image)
  {
    return $this->showOne($image, 200);
  }

  public function store(Growlog $growlog, GrowlogDayImage $image)
  {
    return $this->showOne($image, 200);
  }

}
