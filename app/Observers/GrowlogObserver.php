<?php

namespace App\Observers;
use App\Models\Growlogs\Growlog;
use App\Models\Stage;

class GrowlogObserver
{
  public function created(Growlog $growlog)
  {
    // 
    // if( count($growlog->stages)==0 ){
    //   echo('notiene'.'--');
    //   $growlog->stages()->sync(1);
    //   echo('guardado'.'--');
    // }
    // else {
    //   echo('tiene'.'--');
    // }
  }
}
