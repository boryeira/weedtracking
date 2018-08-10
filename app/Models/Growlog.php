<?php

namespace App\Models;

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
      return $this->hasMany('App\Models\GrowlogDay');
  }

  public function stages()
  {
      return $this->belongsToMany('App\Models\Stage', 'growlog_stage');
  }
}
