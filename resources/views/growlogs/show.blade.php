@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <p>
          {{$growlog->name}}
        </p>
      </div>
      <div class="col-8">
        <div id='calendar'></div>
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
    <script>
      $(document).ready(function() {
        $('#calendar').fullCalendar({
          events: function(start, end, timezone, callback) {
            $.ajax({
              url: '{!! url('api/growlogs/'.$growlog->id.'/days') !!}',
              type: 'GET',
              dataType: 'json',
              success: function(doc) {
                var events = [];
                $(doc.data).each(function(u) {
                  console.log(doc.data[u].start);
                  events.push({
                     title: doc.data[u].id,
                     start: doc.data[u].start, // will be parsed
                     url: doc.data[u].links[0].href,
                   });

                });
                callback(events);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                alert('error al traer la informacion');
              },
            });
          }
        })
      });
    </script>
@endsection
