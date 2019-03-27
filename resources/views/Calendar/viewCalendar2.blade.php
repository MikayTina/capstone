@extends('main')

<!--@section('style')
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>-->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"/>
     <link rel="stylesheet" href="=https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.css"/>
     <script src=https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js></script>
 

@endsection


@section('content')

<div class="container border border-gray" style="margin-top: 50px">
	<div class="form-group" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@endsection-->


@section('content')

<div class="containerx">
		<div id='calendar'></div>
</div>
<br>
<br>
<br>

@endsection

@section('script')

	<script type="text/javascript">
			$(function(){

				$('#calendar').fullcalendar();

			})
		
	</script>
@endsection
