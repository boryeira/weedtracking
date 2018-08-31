<?php

namespace App\Observers;
use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogStage;
use App\Models\Stage;

class GrowlogObserver
{
  public function created(Growlog $growlog)
  {

    foreach (Stage::orderBy('weight')->get() as $stage) {

      $growlogStage = new GrowlogStage;
      $growlogStage->stage_id = $stage->id;
      $growlogStage->growlog_id = $growlog->id;
      $growlogStage->save();
    }
  }
}
