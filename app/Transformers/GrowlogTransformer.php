<?php

namespace App\Transformers;

use App\Models\Growlogs\Growlog;
use League\Fractal\TransformerAbstract;

class GrowlogTransformer extends TransformerAbstract
{

  public function transform(Growlog $growlog)
  {
    $growlogLastDay = $growlog->days->last();
    return [
      'id' => (string)$growlog->id,
      'name' => (string)$growlog->name,
      'description' => (string)$growlog->description,

      'last_day' => [
        'id' => (string)$growlogLastDay->id,
        'fecha' => (string)$growlogLastDay->date,
        'fechaCreacion' => (string)$growlogLastDay->created_at,
        'dia' =>  (string)$growlogLastDay->stage_day,
        'images' => [
          'count' => count($growlogLastDay->images),
          'links' => $growlogLastDay->images->toArray(),
        ],
        'texts' => [
          'count' => count($growlogLastDay->texts),
          'links' => $growlogLastDay->texts->toArray(),
        ],
      ],

      'links' => [

        'self' => [
          'href' => route('growlogs.show',['growlog' => $growlog->id] ),
          'api' => route('api.growlogs.show',['growlog' => $growlog->id] ),
        ],
        'days' => [
          'href' => route('days.index',['growlog' => $growlog->id] ),
          'api' => route('api.days.index',['growlog' => $growlog->id] ),
        ],
      ],
    ];
  }



  public static function originalAttribute($index)
  {
    $attributes = [
        'id' => 'id',
        'fechaCreacion' => 'created_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }


}
