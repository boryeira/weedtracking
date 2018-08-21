@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <growlogday v-bind:growlog="{{$growlog->id}}" ></growlogday>

            </div>
          </div>

        </div>
    </div>
</div>
@endsection
