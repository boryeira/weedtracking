<?php

namespace App\Transformers;

use App\Models\Growlogs\GrowlogDayImage;
use League\Fractal\TransformerAbstract;

class GrowlogDayImageTransformer extends TransformerAbstract
{

  public function transform(GrowlogDayImage $growlogDayImage)
  {
    return [
      'id' => (string)$growlogDayImage->id,
      'imageUrl' => (string)$growlogDayImage->url,
      'fechaCreacion' => (string)$growlogDayImage->created_at,

    ];
  }



  public static function originalAttribute($index)
  {
    $attributes = [
        'id' => 'id',
        'imageUrl' => 'link',
        'fechaCreacion' => 'created_at',
    ];

    return isset($attributes[$index]) ? $attributes[$index] : null;
  }

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    // public function transform(Company $company)
    // {
    //   return [
    //     'RUT' => (string)$company->rut,
    //     'RUT_formated' => (string)Rut::set($company->rut)->fix()->format(),
    //     'RazonSocial' => (string)$company->razon_social,
    //     'fechaCreacion' => (string)$company->created_at,
    //     'fechaActualizacion' => (string)$company->updated_at,
    //     'fechaEliminacion' => isset($company->deleted_at) ? (string) $company->deleted_at : null,
    //
    //     'links' => [
    //       [
    //         'rel' => 'self',
    //         'href' => route('companies.show', $company->rut),
    //       ],
    //       [
    //         'rel' => 'activities.companies',
    //         'href' => route('companies.activities.index', $company->rut),
    //       ],
    //     ],
    //   ];
    // }
    //
    // public static function originalAttribute($index)
    // {
    //   $attributes = [
    //       'RUT' => 'rut',
    //       'RazonSocial' => 'razon_social',
    //       'fechaCreacion' => 'created_at',
    //       'fechaActualizacion' => 'updated_at',
    //       'fechaEliminacion' => 'deleted_at',
    //   ];
    //
    //   return isset($attributes[$index]) ? $attributes[$index] : null;
    // }

}
