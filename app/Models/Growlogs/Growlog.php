<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\GrowlogTransformer;


class Growlog extends Model
{
  protected $fillable = [
      'name', 'user_id',
  ];

  protected $dates = ['date' ];

  public $transformer = GrowlogTransformer::Class;

  //boot al instanciar modelo
  // public static function boot()
  // {
  //   //observador del modelo
  //
  // }

  public function user()
  {
      return $this->belongsTo('App\Models\User');
  }

  public function days()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogDay', 'growlog_id')
                  ->orderBy('date', 'desc');
  }

  public function growlogStages()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogStage', 'growlog_id');
  }

  public function actualStage()
  {
      return $this->hasMany('App\Models\Growlogs\GrowlogStage', 'growlog_id')->where('stage_start','<=',today())->where('stage_end','>=',today())->first();
  }

  public function images()
  {
      return $this->hasManyThrough('App\Models\Growlogs\GrowlogDayImage', 'App\Models\Growlogs\GrowlogDay', 'growlog_id','growlog_day_id','id','id');
  }
}
