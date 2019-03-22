@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        @foreach($evt as $evts)
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style=""><i class="fas fa-fw fa fa-calendar"></i>{{$evts->title}}</li>
        </ol> 
        
                <div class="container">
        <fieldset style="margin-bottom: 30px;margin-left: 0px;border:solid thin gray;border-radius: 10px">
          <div class="container" style="margin-left: 10px">
            <div class="row">
              <div class="col-md-4">
                <p style="font-size: 15px"> <h5>Venue:</h5>{{$evts->venue}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Date:</h5> {{$evts->date}}</p>
              </div>
               <div class="col-md-2">
                <p style="font-size: 15px"><h5>Start Time:</h5> {{$evts->start_time}}</p>
              </div>
               <div class="col-md-2">
                <p style="font-size: 15px"><h5>End Time:</h5><span id="datetime">{{$evts->end_time}}</span></p>
              </div>
            </div>
          </div>
      </fieldset>

        @endforeach
  
@endsection


@section('script')

  <script type="text/javascript">

  
  </script>  

@endsection
