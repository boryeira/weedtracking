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
      'fecha' => (string)$growlogDay->date->format('d-m-Y'),
      //fullcalendar
      'title' => (string)$growlogDay->id,
      'start' => (string)$growlogDay->date,

      'fechaCreacion' => (string)$growlogDay->created_at,
      'day' => $growlogDay->stage_day,
      'stage' => $growlogDay->stage->name ?? '' ,
      'images' => [
        'count' => count($growlogDay->images),
        'links' => $growlogDay->images->toArray() ?? array(0 => null),
      ],
      'texts' => [
        'count' => count($growlogDay->texts),
        'links' => $growlogDay->texts->toArray() ?? array(0 => null),
      ],
      'links' => [
        'self' => [
          'href' => route('api.days.show',['growlog' => $growlogDay->growlog->id , 'day' =>$growlogDay->id] ),
        ],
        'growlog' => [
          'name' => $growlogDay->growlog->name,
          'description' => $growlogDay->growlog->description,
          'api' => route('api.growlogs.show',['growlog' => $growlogDay->growlog->id ] ),
          'href' => route('growlogs.show',['growlog' => $growlogDay->growlog->id ] ),
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
