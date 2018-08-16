@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <p>
          {{$growlog->name}}
        </p>

        <div class="card alternable" id="growlog-add" style="display:none;">
          <div class="card-body">
            meter
          </div>
        </div>
        <div class="card alternable" id="growlog-show" style="">
          <div class="card-body">

            <example v-bind:message="message"></example>
            @{{message}}
              <div id="botonmagico" v-on:click="clickedButton" data-id="-">Greet</div>
          </div>
        </div>
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
    <script>
  $(document).ready(function() {
      $('.gatillo').click(function(){
        alert($(this).prop('ref'));
      })
    });
    </script>
@endsection
