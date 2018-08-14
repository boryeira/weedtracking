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
      'dia' => (string)$growlogDay->date,
      'fechaCreacion' => (string)$growlogDay->created_at,
    ];
  }

  public static function originalAttribute($index)
  {
    $attributes = [
        'id' => 'id',
        'dia' => 'date',
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
