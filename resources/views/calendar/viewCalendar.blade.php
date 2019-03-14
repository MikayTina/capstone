@extends('main')


@section('content')

<div class="container">
                <div class="col-md-10">
		<div id='calendar'></div>
</div>
</div>
<br>
<br>
<br>

@endsection

@section('script')
<script type="text/javascript">

  $(function () {

    var evt = [];
     $.ajax({ 
          url:"{{URL::route('getEvent')}}",
          type:"GET",
          dataType:"JSON",
          async:false
    }).done(function(r){

          evt = r;
    });
	
		    

      $("#calendar").fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },

      minTime: "06:00:00",
      maxTime: "20:00:00",
      events: evt,
      textColor: 'white',

      dayClick: function(date, jsEvent, view, resourceObj) {


               var r = confirm('Do you want to plot on this date ' + date.format());

                if(r== true){

                   var base = '{{ URL::to('/create_event') }}';

                  window.location.href=base;
                }
        
        },

      
       eventClick: function(calEvent, jsEvent, view) {

          var er = confirm('Do you want to plot on this date ');
       }

    });




      })

</script>
@endsection


