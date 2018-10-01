<?php

namespace App\Transformers;

use App\Models\Growlogs\GrowlogDay;
use League\Fractal\TransformerAbstract;

class GrowlogDayTransformer extends TransformerAbstract
{

  public function transform(GrowlogDay $growlogDay)
  {
    return [
      'id' => (string)$growlogDay->id,
      'fecha' => (string)$growlogDay->date,
      //fullcalendar
      'title' => (string)$growlogDay->id,
      'start' => (string)$growlogDay->date,

      'fechaCreacion' => (string)$growlogDay->created_at,
      'dia' => $growlogDay->stage_day,
      'images' => [
        'count' => count($growlogDay->images),
        'links' => $growlogDay->images->toArray(),
      ],
      'texts' => [
        'count' => count($growlogDay->texts),
        'links' => $growlogDay->texts->toArray(),
      ],
      'links' => [

          'self' => [
            'href' => route('api.days.show',['growlog' => $growlogDay->growlog->id , 'day' =>$growlogDay->id] ),
          ],
          'growlog' => [
            'href' => route('api.growlogs.show',['growlog' => $growlogDay->growlog->id ] ),
          ],

      ],
    ];
  }



  public static function originalAttribute($index)
  {
    $attributes = [
        'id' => 'id',
        'dia' => 'date',
        'title' => 'id',
        'start' => 'date',
        'fechaCreacion' => 'created_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }


}
