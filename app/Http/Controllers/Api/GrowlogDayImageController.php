<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use App\Models\GrowlogDayImage;

class GrowlogDayImageController extends ApiController
{
  public function index()
  {
    $images = GrowlogDayImage::all();
    return $this->showAll($images);
    // return response()->json(['data' => $companies]);
  }
}
