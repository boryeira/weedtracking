

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
                id: "{!!$day->id!!}",
                title: "{!!'seguimiento '.$day->id!!}",
                start : "{!!$day->date!!}",
                editable: true,
                // url: "{!! route('days.show',['growlog' => $day->growlog->id , 'day' =>$day->id] )!!}",
                ulink: "{!! route('days.update', ['growlog' => $day->growlog->id , 'day' =>$day->id] ) !!}",
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

      ],
      editable: true,
      eventDrop: function(event, delta, revertFunc) {
        $.ajax({
            method: 'POST',
            url: event.ulink,
            data: { 'date': event.start.format(), '_method':'PUT','_token':'{!! csrf_token() !!}' },
            headers: { 'X-CSRF-TOKEN': '{!! csrf_token() !!}' },
            success: function(data, textStatus, jqXHR) {
                console.log(data);    // prints out the data
            }
        });
        // alert(event.title + " was dropped on " + event.start.format());
        //
        // if (!confirm("Are you sure about this change?")) {
        //   revertFunc();
        // }

      },
      dayClick: function( date, jsEvent, view) {
        console.log( date.format());
        $('.card.alternable').hide();
        $('#growlog-add').show();
      },
      eventClick: function( event, jsEvent, view) {
        $('.card.alternable').hide();
        $('#growlog-show').show();
      },
      eventRender: function(event, element) {
        element.find(".fc-title").prepend("<example v-bind:message=\"message\"></example>");
      },
    });
    //acciones
    // $('#calendar').fullCalendar({
    //
    //   droppable: true,
    //   drop: function(date) {
    //     alert("Dropped on " + date.format());
    //   }
    // });

    //fecha inicio
    $('#calendar').fullCalendar('gotoDate' , moment("{!!$growlog->days->first()->date!!}"));
    app.$forceUpdate();
  });
</script>
