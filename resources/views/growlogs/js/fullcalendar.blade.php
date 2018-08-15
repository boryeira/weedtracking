

<script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      eventSources: [
        //forma porfect ajax
        // { events: function(start, end, timezone, callback) {
        //   $.ajax({
        //     url: '{!! url('api/growlogs/'.$growlog->id.'/days') !!}',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(doc) {
        //       var events = [];
        //       $(doc.data).each(function(u) {
        //         console.log(doc.data[u].start);
        //         events.push({
        //            title: doc.data[u].id,
        //            start: doc.data[u].start, // will be parsed
        //            url: doc.data[u].links[0].href,
        //          });
        //
        //       });
        //       callback(events);
        //     },
        //     error: function (xhr, ajaxOptions, thrownError) {
        //       console.log(xhr.status);
        //       console.log(thrownError);
        //       alert('error al traer la informacion');
        //     },
        //   });
        // }},
      {events:[
          @foreach ($growlog->days as $day)
              {
                title: "{!!'seguimiento '.$day->id!!}",
                start : "{!!$day->date!!}",
                editable: true,
                // url: "{!! route('days.show',['growlog' => $day->growlog->id , 'day' =>$day->id] )!!}",
              },
          @endforeach
      ]},
      {events:[{
          start: '2018-08-10T10:00:00',
          end: '2018-08-17T16:00:00',
          allDay: true,
          backgroundColor: '#ff0000',
          rendering: 'background',
          color: '#ff9f89',
        }]},

      ]
    })
  });
</script>
