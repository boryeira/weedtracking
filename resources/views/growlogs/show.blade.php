@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
          events: [
            @foreach ($growlog->days as $day)
            {
              title: '{!!$day->date!!}',
              start: '{!!$day->date!!}',
              imageurl: '/img/plant.png',
            },
            @endforeach

           ],
           eventRender: function(event, eventElement) {
              if (event.imageurl) {
                  eventElement.find("div.fc-content").prepend("<div'><img src='" + event.imageurl +"' width='100'></div>");
              }
           },
        })
      });
    </script>
@endsection
