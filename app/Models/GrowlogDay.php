<?php

namespace App\Models;
use App\Observers\GrowlogDayObserver;

use Illuminate\Database\Eloquent\Model;

class GrowlogDay extends Model
{
  //boot al instanciar modelo
  public static function boot()
  {
    //observador del modelo
    GrowlogDay::observe(GrowlogDayObserver::class);
  }

  public function growlog()
  {
      return $this->belongsTo('App\Models\Growlog');
  }
}
