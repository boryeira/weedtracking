@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <p>
        {{$growlog->name}}
      </p>
      <div id='calendar'></div>
    </div>
</div>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
@endsection

@section('script')
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
                     start: doc.data[u].start // will be parsed
                   });

                });
                callback(events);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              },
            });
          }
        })
      });
    </script>
@endsection
