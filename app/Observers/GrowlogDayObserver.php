<?php

namespace App\Observers;

use App\Models\Growlogs\GrowlogDay;

class GrowlogDayObserver
{
  public function saving(GrowlogDay $growlogDay)
  {
    $exist = GrowlogDay::where('growlog_id',$growlogDay->growlog_id)->where('date',$growlogDay->date)->first();
    if((count($exist)!=0)&&($exist->id!=$growlogDay->id)){
      return false;
    }
  }


}
