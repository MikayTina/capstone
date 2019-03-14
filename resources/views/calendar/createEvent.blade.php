@extends('main')
@section('content')


 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create Event</li>
        </ol>

        <!-- Icon Cards-->
    <form action="{{URL::to('/add_event')}}" method="post">
          {{csrf_field()}}
      <div class="container border border-dark" style="margin-top: 50px">
              <div class="form-group" style="margin-bottom: 20px;margin-top: 10px">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                    <input type="text" id="title" class="form-control" placeholder="Title" required="required" autofocus="autofocus" name="title">
                    <label for="title">Title</label>
                  </div>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="venue" class="form-control" placeholder="Venue" required="required" autofocus="autofocus" name="venue">
                    <label for="venue">Venue</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" id="event_date" class="form-control" placeholder="Schedule Date" required="required" autofocus="autofocus" name="event_date">
                    <label for="event_date">Schedule Date</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="time" id="start_time" class="form-control" placeholder="Start Time" required="required" autofocus="autofocus" name="start_time">
                    <label for="start_time">Start Time</label>
                  </div>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="time" id="end_time" class="form-control" placeholder="End Time" required="required" autofocus="autofocus" name="end_time">
                    <label for="event_date">End Time</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
               
                    <select multiple='multiple' id="my-select" name="my-select[]">
                        <option value='elem_1'>elem 1</option>
                        <option value='elem_2'>elem 2</option>
                        <option value='elem_3'>elem 3</option>
                        <option value='elem_4' >elem 4</option>
                        <option value='elem_100'>elem 100</option>
                    </select>
               
              </div>
            </div>
      </div>

          <div class="col-md-12">
             <input style="width:400px;float:right;margin-top: 10px" class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
           </div><br>
           <br>
           <br>
         

           </form>
      
@endsection

@section('script')

    <script type="text/javascript">
  // run pre selected options
  $('#my-select').multiSelect();
  </script>  

@endsection


