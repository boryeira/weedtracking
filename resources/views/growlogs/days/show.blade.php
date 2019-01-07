@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">


          <div class="ibox">
            <div class="ibox-body">
              <div class="d-flex justify-content-between mb-4">
                  <div>
                    @if($day->stage)
                      <h3 class="m-0">{{$day->stage->name}} Día {{$day->stage_day}} </h3>
                    @endif
                      <div>{{$day->date}}</div>
                  </div>
                  <ul class="nav nav-pills nav-pills-rounded nav-pills-air" id="chart_tabs">
                    <li class="nav-item ml-1">
                        <a class="nav-link" >Editar</a>
                    </li>
                    <li class="nav-item ml-1">
                        <a class="nav-link  active" >Volver</a>
                    </li>
                  </ul>
              </div>

            </div>

          </div>

        </div>
    </div>


@endsection

@section('page-header')
  @include('growlogs.header',['growlog' => $growlog])
@endsection

@section('fab')

@endsection

@section('script')


@endsection
