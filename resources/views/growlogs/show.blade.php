@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <p>
          {{$growlog->name}}
        </p>
        <example-component></example-component>
      </div>
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <div id='calendar'></div>
          </div>
        </div>
      </div>


    </div>
</div>
@endsection

@section('css')
    {{-- fulLcalendar --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
@endsection

@section('script')

    {{-- fullcalendar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js" defer></script>
    @include('growlogs.js.fullcalendar',['growlog'=>$growlog])
@endsection
