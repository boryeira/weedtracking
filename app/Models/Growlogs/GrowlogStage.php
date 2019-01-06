<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Observers\GrowlogStageObserver;
use App\Models\Stage;


class GrowlogStage extends Model
{
  protected $date = ['stage_start','stage_end'];

  protected $fillable = [
      'stage_start',
      'stage_end'
  ];

  // //boot al instanciar modelo
  // public static function boot()
  // {
  //   //observador del modelo
  //
  // }

  public function stage()
  {
      return $this->belongsTo('App\Models\Stage');
  }

  public function growlog()
  {
      return $this->belongsTo('App\Models\Growlogs\Growlog');
  }

  //stage previa en base al weight del objeto
    //retorna null si no pilla el objeto
  public function prevStage()
  {
    $stage = $this->stage;
    $weight = $stage->weight;
    $growlog = $this->growlog;
    $prevStage_weight = intval($weight) - 1;
    if(Stage::where('weight',$prevStage_weight)->first()){
          $prevStage = Stage::where('weight',$prevStage_weight)->first();
          return GrowlogStage::where('growlog_id',$growlog->id)->where('stage_id',$prevStage->id)->first();
    }
    else {
      return null;
    }
  }
  //stage proxima en base al weight del objeto
  //retorna null si no pilla el objeto
  public function nextStage()
  {
    $stage = $this->stage;
    $weight = $stage->weight;
    $growlog = $this->growlog;
    $nextStage_weight = intval($weight) + 1;
    if(Stage::where('weight',$nextStage_weight)->first()){
          $nextStage = Stage::where('weight',$nextStage_weight)->first();
          return GrowlogStage::where('growlog_id',$growlog->id)->where('stage_id',$nextStage->id)->first();
    }
    else {
      return null;
    }
  }


}
