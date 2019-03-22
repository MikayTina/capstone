@extends('main')
@section('content')


 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create Event</li>
        </ol>

        <!-- Icon Cards-->
         <div class="container" style="margin-top: 30px">
        <p style="font-size:50px;margin-bottom: 20px">Create Event</p>
    <form action="{{URL::to('/add_event')}}" method="post">
          {{csrf_field()}}
            <fieldset style="margin-bottom: 30px">
            <legend style="color:white;text-indent: 20px;width:1100px;margin-bottom: 40px" class="bg bg-dark">Event Details</legend>
                <div class="form-group" style="margin-left:20px">
                    <div class="form-row">
                       <div class="col-md-12">
                          <div class="form-label-group">
                             <h6>Title*</h6>
                              <input type="text" id="title" class="form-control" placeholder="Title" required="required" autofocus="autofocus" name="title" value="{!! old('title') !!}">
                          </div>
                       </div>
                    </div>
                </div>
                <div class="form-group" style="margin-left:20px">
                    <div class='form-row'>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-11">
                                  <div class="form-label-group">
                                    <h6>Venue*</h6>
                                      <input type="text" id="venue" class="form-control" placeholder="Venue" name="venue">
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                                <div class="form-label-group">
                                    <h6>Start Date*</h6>
                                    <input type="date" id="start_date" class="form-control" placeholder="Start Date" name="start_date">
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-label-group">
                                  <h6>Start Time*</h6>
                                  <input type="time" id="start_time" class="form-control" placeholder="Start Time" name="start_time" value="12:00">
                                </div>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                              <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-label-group">
                                    <h6>End Date*</h6>
                                    <input type="date" id="end_date" class="form-control" placeholder="End Date" name="end_date">
                                </div>
                              </div>
                                <div class="col-md-5">
                                  <div class="form-label-group">
                                    <h6>End Time*</h6>
                                    <input type="time" id="end_time" class="form-control" placeholder="End Time" name="end_time" value="12:00">
                                  </div>
                                </div>
                             </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
              <div class="form-group">
              <div class='form-row'>
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header"><h6>List of Patient To Attend</h6></div>
                     <div class="card-body center">


                              <div class="form-group">
                                <div class="form-row">

                              <select multiple='multiple' id="element" name="element[]"  style="font-size:18">
                                  @foreach($interven as $interven)
                                       <option value="{{ $interven->id }}">{{ $interven->interven_name }}</option>
                                  @endforeach
                              </select>
                        
                               </div>
                              </div>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  

                  </div>    

        </fieldset>

          <div class="col-md-12">
             <input style="width:400px;float:right;margin-top: 10px" class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
           </div><br>
           <br>
           <br>
           <br>
         

           </form>
         </div>
      
@endsection

@section('script')

  <script type="text/javascript">
    $("#element").bootstrapDualListbox({
         nonSelectedListLabel: 'Non-selected',
         selectedListLabel: 'Selected Patient',
         preserveSelectionOnMove: 'moved',
         moveOnSelect: false
});

    $("#element").setMoveAllLabel('select all', refresh) 


 

  </script>  

@endsection


