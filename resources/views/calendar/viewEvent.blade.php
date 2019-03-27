@extends('main')

@section('style')

<style type="text/css">
<!--
input.largerCheckbox
{
width: 30px;
height: 30px;
}
//-->
</style>

@endsection
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

         <div class="form-group">
                  <div class='form-row'>
                      <div class="col-md-12">
                        <div class="card" >
                          <div class="card-header"><h6>List of Patient To Attend</h6></div>
                            <div class="card-body">
                              <div class="container" style="margin:45px auto">
                                  <div class="row">
                                      <div class="col-md-12 col-md-offset-3" >
                                        <table class="table table-hover table-striped table-bordered">
                                          <thead>
                                            <tr>
                                             <!-- <th style="text-align:center;width:45px"><input type="checkbox" id="checkall"/></th>-->
                                              <th>Name</th>
                                              <th>Date Last Visited</th>
                                              <th>Contact Number</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($pats as $patients)
                                          <tr>
                                             <td height="50"><a> {{ $patients->lname }}, {{ $patients->fname }}</a></td>
                                             <td height="50"><a> </a></td>
                                             <td height="50"><a></a></td>
                                             <td>

                                                <button class="btn btn btn-dark btn-block open-modal" value="{{$patients->id}}">Attended</button>

                                             </tr>
                                          @endforeach

                                  
                                          </tbody>
                                      </table>
                                    </div> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

            <div class="modal fade" id="linkEditorModal" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content"  style="width:980px;">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Add Intervention the Patient Attended</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                @foreach($intv as $interven)

                                    <div class="checkbox">
                                      <label><input type="checkbox" style="zoom:1.5;font-size: 28px"  value="{{$interven->id}}">{{$interven->interven_name}}</label>
                                      </div>

                                @endforeach
                                
                          
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" name ="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="id" name="id" value="0">
                            <input type="hidden" id="patient_id" name="patient_id" value="">

                        </div>
                    </div>
                </div>
            </div>
        </div>

  
@endsection


@section('script')

  <script type="text/javascript">

  //$(document).ready(function () {
    ////----- Open the modal to CREATE a link -----////
   /* $('#visitPatient').click(function () {

      console.log('enters');
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#linkEditorModal').modal('show');
    });

})*/

   $(document).ready(function () {
    ////----- Open the modal to CREATE a link -----////
 

        $('body').on('click', '.open-modal', function () {

        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#linkEditorModal').modal('show');
    });
    });
  </script>  

@endsection
