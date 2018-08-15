<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Observers\GrowlogObserver;

class Growlog extends Model
{
  protected $fillable = [
      'name', 'user_id',
  ];

  protected $dates = ['created_at' ];

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

  public function stages()
  {
      return $this->belongsToMany('App\Models\Stage', 'growlog_stage');
  }

  public function images()
  {
      return $this->hasManyThrough('App\Models\Growlogs\GrowlogDayImage', 'App\Models\Growlogs\GrowlogDay', 'growlog_id','growlog_day_id','id','id');
  }
}
