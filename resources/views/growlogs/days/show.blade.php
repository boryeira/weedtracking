@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">


          <div class="ibox">
            <div class="ibox-body">
              <div class="d-flex justify-content-between mb-2">
                  <div>
                    @if($day->stage)
                      <h3 class="m-0">{{$day->stage->name}} Día {{$day->stage_day}} </h3>
                    @endif
                      <div>{{$day->date}}</div>
                  </div>
                  <ul class="nav nav-pills nav-pills-rounded nav-pills-air" id="chart_tabs">
                    <li class="nav-item ml-1">
                        <a class="nav-link  active" href="{{route('growlogs.show',['growlog' => $growlog->id])}}">Volver</a>
                    </li>
                  </ul>
              </div>
                <div class="row">
                  <div class="col-6">
                    <day-images  v-bind:dayId="{{$day->id}}" v-bind:growlogId="{{$growlog->id}}" ></day-images>
                  </div>
                  <div class="col-6">

                  </div>

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
