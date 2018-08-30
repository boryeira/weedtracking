@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="ibox">
            <div class="ibox-body">
              {{Form::open(['action' => ['GrowlogController@stages',$growlog->id], 'method' => 'PUT'])}}
              @foreach (App\Models\Stage::all() as $stage)
                <div class="form-group">
                  <label>{{$stage->name}}</label>
                  <input type="date" class="form-control" name="{{$stage->id}}" />
                </div>
              @endforeach
              <button type="submit">enviar</button>
              {{Form::close()}}
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
