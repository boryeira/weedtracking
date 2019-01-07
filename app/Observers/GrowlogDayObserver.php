<?php

namespace App\Observers;

use App\Models\Growlogs\GrowlogDay;
use Carbon\Carbon;

class GrowlogDayObserver
{
  public function saving(GrowlogDay $growlogDay)
  {

    $exist = GrowlogDay::where('growlog_id',$growlogDay->growlog_id)->where('date',$growlogDay->date->format('Y-m-d'))->first();

    if((count($exist)!=0)){
      return false;
    }
  }

  public function saved(GrowlogDay $growlogDay)
  {

    foreach ($growlogDay->growlog->growlogStages as $stage) {
      if((($growlogDay->date->gte($stage->stage_start)) && ($stage->stage_start !=null) )&&(($growlogDay->date->lte($stage->stage_end))||($stage->stage_end == null)) )
      {
          $stage_start = new Carbon($stage->stage_start);
          $growlogDay->stage_id =  $stage->stage->id;
          $growlogDay->stage_day = $stage_start->diffInDays($growlogDay->date)+1;
          $growlogDay->flushEventListeners();
          $growlogDay->save();
      }

    }

  }


}
