<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Growlog extends Model
{
  protected $fillable = [
      'name', 'user_id',
  ];
  
  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }

  public function days()
  {
      return $this->hasMany('App\Models\GrowlogDay');
  }
}
