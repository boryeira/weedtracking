<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;

class Growlog extends Model
{
  protected $fillable = [
      'name', 'user_id',
  ];

  protected $dates = ['created_at' ];

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }

  public function days()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDay', 'growlog_id');
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
