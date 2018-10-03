<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\GrowlogDayTransformer;
use App\Observers\GrowlogDayObserver;


class GrowlogDay extends Model
{
  //transformador para la api
  public $transformer = GrowlogDayTransformer::Class;
  //boot al instanciar modelo
  public static function boot()
  {
    //observador del modelo
    GrowlogDay::observe(GrowlogDayObserver::class);
  }

  public function growlog()
  {
      return $this->belongsTo('App\Models\Growlogs\Growlog');
  }
  public function images()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDayImage');
  }
  public function texts()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDayText');
  }
  public function stage()
  {
      return $this->belongsTo('App\Models\Stage');
  }
}
