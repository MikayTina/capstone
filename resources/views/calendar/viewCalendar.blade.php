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
        right: 'month,agendaWeek,listWeek'
      },

      eventTextColor: '#FFFFFF',



      minTime: "06:00:00",
      maxTime: "20:00:00",
      events: evt,

      dayClick: function(date, end, jsEvent, view, resourceObj) {

               var current_date = moment().format('YYYY-MM-DD')

              if(current_date <= date.format()) {
               var r = confirm('Do you want to plot on this date ' + date.format());

                if(r== true){

                   var base = '{{ URL::to('/create_event') }}';

                  window.location.href=base;
                }
            
            }
        },

       dayRender: function(date, cell){

             var current_date = moment().format('YYYY-MM-DD');

              if(current_date > date.format()) {

                  cell.css("background", "#e8e8e8");
              }
       
      },

      
       eventClick: function(calEvent, jsEvent, view) {

              var id = calEvent.id;

                var url = '{{ URL::to('/view_event') }}'+'/'+id;

                window.location.href=url;

       }

    });




      })

</script>
@endsection


