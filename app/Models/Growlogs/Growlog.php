<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\GrowlogTransformer;
use App\Observers\GrowlogObserver;

class Growlog extends Model
{
  protected $fillable = [
      'name', 'user_id',
  ];

  protected $dates = ['created_at' ];

  public $transformer = GrowlogTransformer::Class;

  //boot al instanciar modelo
  public static function boot()
  {
    //observador del modelo
    Growlog::observe(GrowlogObserver::class);
  }

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }

  public function days()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDay', 'growlog_id')
                  ->orderBy('date', 'asc');
  }

  public function growlogStages()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogStage', 'growlog_id');
  }

  public function images()
  {
      return $this->hasManyThrough('App\Models\Growlogs\GrowlogDayImage', 'App\Models\Growlogs\GrowlogDay', 'growlog_id','growlog_day_id','id','id');
  }
}
