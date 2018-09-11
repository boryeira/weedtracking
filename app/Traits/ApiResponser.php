<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

  trait ApiResponser
  {
    //Respuesta exitosa
    private function succesResponse($data, $code)
    {
      return response()->json($data, $code);
    }

    //Respuesta errónea
    protected function errorResponse($message, $code)
    {
      return response()->json(['error' => $message, 'code' => $code], $code);
    }

    //Función pública pque regresa toda una colección
    protected function showAll(Collection $collection, $code = 200)
    {
      if ($collection->isEmpty()) {
        return $this->succesResponse(['data' => $collection], $code);
      }

      $transformer = $collection->first()->transformer;

      $collection = $this->filtrarDatos($collection, $transformer);

      $collection = $this->ordenarData($collection, $transformer);

      $collection = $this->paginate($collection, $transformer);

      $collection = $this->transformData($collection, $transformer);

      $collection = $this->cacheResponse($collection);

      return $this->succesResponse($collection, $code);

    }

    //Función pública pque regresa toda una colección transformada en evento
    protected function showAllFullcalendar(Collection $collection, $code = 200)
    {
      if ($collection->isEmpty()) {
        return $this->succesResponse(['data' => $collection], $code);
      }

      $transformer = $collection->first()->transformer;

      $collection = $this->filtrarDatos($collection, $transformer);

      $collection = $this->ordenarData($collection, $transformer);

      $collection = $this->paginate($collection, $transformer);

      $collection = $this->transformData($collection, $transformer);

      $collection = $this->cacheResponse($collection);

      return $this->succesResponse($collection, $code);

    }

    //Función protegida que regresa toda una instancia
    protected function showOne(Model $instance, $code)
    {
      $transformer = $instance->transformer;

      $instance = $this->transformData($instance, $transformer);

      return $this->succesResponse($instance, $code);

    }

    public function filtrarDatos(Collection $collection, $transformer)
    {
      foreach (request()->query() as $indexquery => $valuequery) {
        $attribute = $transformer::originalAttribute($indexquery);
        if (isset($attribute, $valuequery)) {
          $collection = $collection->where($attribute, $valuequery);
        }
      }
      return $collection;
    }

    // Función protegida que ordena una colección (ocupada en método "showAll")
    protected function ordenarData(Collection $collection, $transformer)
    {
      if (request()->has('sort_by')) {
        $attribute = $transformer::originalAttribute(request()->sort_by);

        $collection = $collection->sortBy->{$attribute};
      }

      return $collection;

    }

    protected function paginate(Collection $collection)
    {
      $rules = [
        'per_page' => 'integer|min:2|max:50'
      ];

      Validator::validate(request()->all(), $rules);

      $page = LengthAwarePaginator::resolveCurrentPage();

      $perPage = 3;

      if (request()->has('per_page')) {
        $perPage = (int)request()->per_page;
      }

      $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();

      $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

      return $paginated->appends(request()->all());

// new LengthAwarePaginator($items, $total, $perPage [, $currentPage, $options])

    }

    //Función protegida que transforma los índices de los datos entregados
    protected function transformData($datos, $transformer)
    {

      $transformation = fractal($datos, new $transformer);
      return $transformation->toArray();

    }

    protected function cacheResponse($datos)
    {
      $url = request()->url();
      $queryParams = request()->query();
      ksort($queryParams);
      $queryString = http_build_query($queryParams);

      $fullUrl = "{$url}?{$queryString}";

      return Cache::remember($fullUrl, 15/60, function() use($datos) {
          return $datos;
        });

    }



  }
