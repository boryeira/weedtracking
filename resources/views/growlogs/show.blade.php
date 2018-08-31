@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
          <div class="card">
            <div class="card-body">

              <growlogday v-bind:growlog="{{$growlog->id}}" ></growlogday>

            </div>
          </div>

        </div>
    </div>
</div>
@endsection
