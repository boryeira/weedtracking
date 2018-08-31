<?php

namespace App\Observers;
use App\Models\Growlogs\GrowlogStage;
use Carbon\Carbon;
use Session;

class GrowlogStageObserver
{
      public function updating(GrowlogStage $growlogstage){
        $prev = $growlogstage->prevStage();

        $prev_start = new Carbon($prev->stage_start);
        $actual_start = new Carbon($growlogstage->stage_start);



        while($prev!=null){
          $prev_start = new Carbon($prev->stage_start);
          $actual_start = new Carbon($growlogstage->stage_start);
          if($actual_start->lt($prev_start)){
            session::flash('warning','es mas chico');
            return false;

          }
          else{
            $prev = $prev->prevStage();
          }
        }
        session::flash('success','todo bien');

      }
      public function updated(GrowlogStage $growlogstage){

      }
}
