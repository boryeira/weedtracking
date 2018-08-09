<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrowlogDay extends Model
{

  public function growlog()
  {
      return $this->belongsTo('App\Models\Growlog');
  }
}
