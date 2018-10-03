<?php

namespace App\Observers;
use App\Models\Growlogs\GrowlogStage;
use App\Models\Growlogs\GrowlogDay;
use Carbon\Carbon;
use Session;

class GrowlogStageObserver
{

      public function updating(GrowlogStage $growlogstage){

        //VERIFICACION QUE LA ETAPA A ACTUALIZAR CUMPLA LAS REGLAS
        $actual_start = new Carbon($growlogstage->stage_start);

        //PREVIA
        $prev = $growlogstage->prevStage();
        while($prev!=null){
          $prev_start = new Carbon($prev->stage_start);
          if(($actual_start->lt($prev_start))&&($prev->stage_start!=null) ){
            session::flash('warning','es mas chico');
            return false;
          }
          else {
            $prev = $prev->prevStage();
          }
        }
        //FIN PREVIA
        //NEXT
        $next = $growlogstage->nextStage();

        while($next!=null){
          $next_start = new Carbon($next->stage_start);

          if(($actual_start->gt($next_start))&&($next->stage_start!=null) ){
            session::flash('warning','es mas grande');
            return false;

          }
          else {
            $next = $next->nextStage();
          }
        }
        //FIN NEXT

        session::flash('success','todo bien');

      }


      public function updated(GrowlogStage $growlogstage){

        $growlog =$growlogstage->growlog;
        $stage_start = new Carbon($growlogstage->stage_start);
        $prev = $growlogstage->prevStage();
        if($prev!=null){
          $prev->stage_end = $stage_start->subDays(1);
          $prev::flushEventListeners();
          $prev->save();
        }

        foreach ($growlog->growlogStages as $growlogStageIn) {
          $start = $growlogStageIn->stage_start;
          $end = $growlogStageIn->stage_end ?? today();
          if($start!=null){
            $growdays = $growlog->days()->where('date','>=',$start)->where('date','<=',$end)->get();
            foreach ($growdays as $day) {

              $day->stage_id = $growlogStageIn->stage_id;
              $stages_start = new Carbon($start);
              $date = new Carbon($day->date);
              $dif = $stages_start->diffInDays($date)+1;
              $day->stage_day = $dif;
              $day->timestamps = false;
              $day->save();
            }
          }


        }








      }
}
