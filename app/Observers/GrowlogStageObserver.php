<?php

namespace App\Observers;
use App\Models\Growlogs\GrowlogStage;

class GrowlogStageObserver
{
      public function updated(GrowlogStage $growlogstage){
       dd($growlogstage->nextStage());
      }
}
