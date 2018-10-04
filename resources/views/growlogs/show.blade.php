@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card text-center has-cup card-air centered mb-4">
              <div class="card-cup bg-warning">

              </div>
              <div class="card-body">

                  <div class="card-avatar mb-4">
                      <img class="img-circle" src="{{url('img/plant.png')}}" alt="image">

                  </div>
                  <h4 class="card-title text-warning mb-1">{{$growlog->name}}</h4>
                  <div class="text-muted">Manager</div>
                  <p class="mt-4 mb-5">{{$growlog->description}}</p>
              </div>
          </div>
          <add-media></add-media>
          <div class="ibox">
            <div class="ibox-body">
              {{Session::get('warning')}}

              @foreach ($growlog->growlogStages as $growlogstage)
              {{Form::open(['route' => ['growlogstages.update',$growlog->id,$growlogstage->id], 'method' => 'PUT'])}}
                <div class="form-group">
                  <label>{{$growlogstage->stage->name}}</label>
                  <input type="date" class="form-control" name="date" value="{{$growlogstage->stage_start}}" />
                </div>
              <button type="submit">enviar</button>
              {{Form::close()}}
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="ibox">

            <div class="ibox-body">


                <days-list v-bind:growlog="{{$growlog->id}}" ></days-list>





            </div>
          </div>

              {{-- <growlogday v-bind:growlog="{{$growlog->id}}" ></growlogday> --}}

        </div>
    </div>
@endsection


@section('fab')
  <div class="fab fab-top">
    <button class="btn btn-lg btn-primary btn-icon-only btn-circle btn-air" data-toggle="button">
      <i class="fab-icon la la-plus"></i>
      <i class="fab-icon-active la la-close"></i>
    </button>

    <ul class="fab-menu">
      <li><a class="btn btn-pink btn-icon-only" ><i class="fab-icon la la-camera"></i></a></li>
    </ul>
  </div>
@endsection
