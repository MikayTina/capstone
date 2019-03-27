@extends('main')

@section('style')

<style>
table, th, td {
  border: 1px solid lightgray;
  border-collapse: collapse;
}
th, td {
  padding: 7px;
  text-align: left;  

}
</style>

@endsection
@section('content')

<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
        <!-- Breadcrumbs-->
      @if($pid)
        @foreach($pat as $pats)
          @if($pats->department_id != Auth::user()->department || Auth::user()->user_role->first()->name == 'Superadmin')
            @foreach($transfers as $trans)
              @if($trans->status == "")
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style=""><i class="fas fa-fw fa fa-user"></i>Patient Information</li>
          <a href="{{URL::to('transfer_patient_now/'.$pats->id.'/'.$trans->to_department.'/'.$trans->transfer_id)}}" class="btn btn-primary" style="margin-left:550px;height: 60px;width: 100px;margin-top: 10px"><p style="margin-top: 10px">Enroll</p></a>
        </ol>
              @elseif(Auth::user()->department == $pats->department_id || Auth::user()->user_role->first()->name == 'Superadmin')
          <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style=""><i class="fas fa-fw fa fa-user"></i>Patient Information</li>
    
        </ol>
            @endif
            @endforeach

          @include('flash::message')
        <!-- Icon Cards-->
        <div class="container">
         <fieldset style="margin-bottom: 30px;margin-left: 0px;border:solid thin gray;border-radius: 10px">
            <legend style="color:white;text-indent: 20px;width:900px;margin-bottom: 20px;border-radius: 5px" class="bg bg-dark">Personal Information</legend>
          <div class="container" style="margin-left: 10px">
            <div class="row">
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Name:</h5> {{$pats->fname}} {{$pats->mname}}. {{$pats->lname}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Date of Birth:</h5> {{$pats->birthdate}}</p>
              </div>
              <div class="col-md-3">
                <p style="font-size: 15px"><h5>Address:</h5> {{$pats->address->street}} {{$pats->address->barangay}} {{$pats->address->city}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Marital Status:</h5> {{$pats->civil_status}}</p>
              </div>
              <div class="col-md-1">
                <p style="font-size: 15px"><h5>Age:</h5> {{$pats->age}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Date Admitted:</h5> {{$pats->created_at}}</p>
              </div>
           </div>
           <div class="row">
          @if($pats->birthorder != NULL)
            @if($pats->birthorder != 'NULL')
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Birth Order:</h5> {{$pats->birthorder}}</p>
              </div>
            @endif
            @if($pats->contact != 'NULL')
              <div class="col-md-3">
                <p style="font-size: 15px"><h5>Contact Number:</h5> {{$pats->contact}}</p>
              </div>
            @endif
            @if($pats->nationality != 'NULL')
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Nationality:</h5> {{$pats->nationality}}</p>
              </div>
            @endif
            @if($pats->religion != 'NULL')
              <div class="col-md-2"> 
                <p style="font-size: 15px"><h5>Religion:</h5> {{$pats->religion}}</p>
              </div>
            @endif
          @endif
           </div>
          </div>
          </fieldset>
          <fieldset style="margin-bottom: 30px;margin-left: 0px;border:solid thin gray;border-radius: 10px">
            <legend style="color:white;text-indent: 20px;width:900px;margin-bottom: 20px;border-radius: 5px" class="bg bg-dark">Transfer Remarks</legend>
          <div class="container" style="margin-left: 10px">
            <div class="row">
            @foreach($transfer as $trans)
              <p style="margin-left: 30px">{{$trans->remarks}}</p>
            @endforeach
           </div>
           <div class="row">
          
           </div>
          </div>
          </fieldset>
        </div>
            
        @else
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style=""><i class="fas fa-fw fa fa-user"></i>Patient Information</li>
          <button class="btn btn-success" style="margin-left: 10px;margin-left:400px;height: 60px;width: 90px;margin-top: 10px">Graduate</button><button class="btn btn-warning" style="margin-left: 10px;height: 60px;width: 90px;margin-top: 10px" data-toggle="modal" data-target="#transferPatient" data-patientid="{{$pats->id}}" data-patientdep="{{$pats->department_id}}">Transfer</button><button class="btn btn-danger" style="margin-left: 10px;height: 60px;width: 90px;margin-top: 10px">Dismiss</button>
        </ol>

          @include('flash::message')
        <!-- Icon Cards-->
        <div class="container">
         <fieldset style="margin-bottom: 30px;margin-left: 0px;border:solid thin gray;border-radius: 10px">
            <legend style="color:white;text-indent: 20px;width:900px;margin-bottom: 20px;border-radius: 5px" class="bg bg-dark">Personal Information</legend>
          <div class="container" style="margin-left: 10px">
            <div class="row">
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Name:</h5> {{$pats->fname}} {{$pats->mname}}. {{$pats->lname}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Date of Birth:</h5> {{$pats->birthdate}}</p>
              </div>
              <div class="col-md-3">
                <p style="font-size: 15px"><h5>Address:</h5> {{$pats->address->street}} {{$pats->address->barangay}} {{$pats->address->city}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Marital Status:</h5> {{$pats->civil_status}}</p>
              </div>
              <div class="col-md-1">
                <p style="font-size: 15px"><h5>Age:</h5> {{$pats->age}}</p>
              </div>
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Date Admitted:</h5> {{$pats->created_at}}</p>
              </div>
           </div>
           <div class="row">
          @if($pats->birthorder != NULL)
            @if($pats->birthorder != 'NULL')
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Birth Order:</h5> {{$pats->birthorder}}</p>
              </div>
            @endif
            @if($pats->contact != 'NULL')
              <div class="col-md-3">
                <p style="font-size: 15px"><h5>Contact Number:</h5> {{$pats->contact}}</p>
              </div>
            @endif
            @if($pats->nationality != 'NULL')
              <div class="col-md-2">
                <p style="font-size: 15px"><h5>Nationality:</h5> {{$pats->nationality}}</p>
              </div>
            @endif
            @if($pats->religion != 'NULL')
              <div class="col-md-2"> 
                <p style="font-size: 15px"><h5>Religion:</h5> {{$pats->religion}}</p>
              </div>
            @endif
          @endif
           </div>
          </div>
          </fieldset>
          <fieldset style="margin-bottom: 30px;margin-left: 0px;border:solid thin gray;border-radius: 10px">
            <legend style="color:white;text-indent: 20px;width:900px;margin-bottom: 20px;border-radius: 5px" class="bg bg-dark">General Information</legend>
          <div class="container" style="margin-left: 10px">
           <div class="row">
  
           </div>
          </div>
          </fieldset>
        </div>
          @endif
        @endforeach
      @else
        @foreach($pat as $pats)
          @if($pats->department_id == Auth::user()->department || Auth::user()->user_role->first()->name == 'Superadmin')
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style=""><i class="fas fa-fw fa fa-user"></i>Patient Information</li>
          <button class="btn btn-success" style="margin-left: 10px;margin-left:400px;height: 60px;width: 90px;margin-top: 10px">Graduate</button><button class="btn btn-warning" style="margin-left: 10px;height: 60px;width: 90px;margin-top: 10px" data-toggle="modal" data-target="#transferPatient" data-patientid="{{$pats->id}}" data-patientdep="{{$pats->department_id}}">Transfer</button><button class="btn btn-danger" style="margin-left: 10px;height: 60px;width: 90px;margin-top: 10px">Dismiss</button>
        </ol>

        

          @include('flash::message')
        <!-- Icon Cards-->
          <div class="row" style="margin-left: 10px;">
            <div style="border-right:solid black 1px;width: 250px">
            <div class="col-md-11" style="text-align: center;">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active bg-dark" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="color:white;margin-bottom: 10px"><h6>Information</h6></a>
                <a class="nav-link bg-dark" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="color:white;margin-bottom: 10px"><h6>Refer</h6></a>
                <a class="nav-link bg-dark" id="v-pills-visit-tab" data-toggle="pill" href="#v-pills-visit" role="tab" aria-controls="v-pills-contact" aria-selected="false" style="color:white;margin-bottom: 10px"><h6>Sessions</h6></a>
                <a class="nav-link bg-dark" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false" style="color:white;margin-bottom: 10px"><h6>History</h6></a>
              </div>
            </div>
          </div>
            <div class="col-md-9">
              <div class="tab-content" id="v-pills-tabContent" >
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                   <fieldset style="margin-bottom: 30px;margin-left: 0px;border:solid thin gray;border-radius: 10px">
                       <legend style="color:white;text-indent: 20px;width:900px;margin-bottom: 20px;border-radius: 5px" class="bg bg-dark">Personal Information</legend>
                    <div class="container" style="margin-left: 10px">
                      <div class="row">
                        <div class="col-md-2">
                          <p style="font-size: 8px"><h6>Name:</h6> {{$pats->fname}} {{$pats->mname}}. {{$pats->lname}}</p>
                         </div>
                       <div class="col-md-2">
                          <p style="font-size: 8px"><h6>Date of Birth:</h6> {{$pats->birthdate}}</p>
                       </div>
                      <div class="col-md-4">
                        <p style="font-size: 8px"><h6>Address:</h6> {{$pats->address->street}} {{$pats->address->barangay}} {{$pats->address->city}}</p>
                      </div>
                      <div class="col-md-2">
                       <p style="font-size: 8px"><h6>Marital Status:</h6> {{$pats->civil_status}}</p>
                      </div>
                      <div class="col-md-1">
                         <p style="font-size: 8px"><h6>Age:</h6> {{$pats->age}}</p>
                      </div>
                      <div class="col-md-3">
                        <p style="font-size: 8px"><h6>Date Admitted:</h6> {{$pats->created_at}}</p>
                      </div>
                      @if($pats->birthorder != NULL)
                      @if($pats->birthorder != 'NULL')
                      <div class="col-md-2">
                        <p style="font-size: 8px"><h6>Birth Order:</h6> {{$pats->birthorder}}</p>
                      </div>
                      @endif
                    @if($pats->contact != 'NULL')
                    <div class="col-md-3">
                      <p style="font-size: 8px"><h6>Contact Number:</h6> {{$pats->contact}}</p>
                    </div>
                    @endif
                    @if($pats->nationality != 'NULL')
                    <div class="col-md-2">
                      <p style="font-size: 8px"><h6>Nationality:</h6> {{$pats->nationality}}</p>
                    </div>
                   @endif
                  @if($pats->religion != 'NULL')
                   <div class="col-md-2"> 
                     <p style="font-size: 8px"><h6>Religion:</h6> {{$pats->religion}}</p>
                  </div>
                 @endif
                @endif
                  </div>
                </fieldset>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                 <!-- <fieldset style="margin-bottom: 30px;margin-left: 0px;">-->
              
                <button id="btn-add" name="btn-add" class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px">Refer Patient</button>
                  <br>
                  <br>
                
                  <div class="card-body" style="margin-left: 10px">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Refer At</th>
                              <th>Reason of Referal</th>
                              <th>Refered by</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="links-list" name="links-list">
                              @foreach ($refers as $refer)
                              <tr id="refer{{$refer->id}}">
                              <td>{{$refer->ref_date}}</td>
                              <td>{{$refer->ref_at}}</td>
                              <td>{{$refer->ref_reason}}</td>
                              <td>{{$refer->ref_by}}</td>
                        <td>
                            <button class="btn btn-info open-modal" value="{{$refer->id}}">Edit
                            </button>
                            <button class="btn btn-danger delete-link" id="btn-accept" name ="btn-accept" value="{{$refer->id}}">Accept
                            </button>
                        </td>
                    </tr>
                @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>

                       

                     <!--  <a href="#modalForm" data-toggle="modal" class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px" data-href="{{url('laravel-crud-search-sort-ajax-modal-form/create')}}"> Refer</a>-->
                </div>

              <div class="tab-pane fade" id="v-pills-visit" role="tabpanel" aria-labelledby="v-pills-visit-tab">
                 <!-- <fieldset style="margin-bottom: 30px;margin-left: 0px;">-->
              
                <button id="btn-add" name="btn-add" class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px">Patient Visit</button>
                <br>

                <div class="row" style="margin-left: 10px;margin-bottom: 50px; margin-top: 70px">
                  @foreach($evts as $evts)
                 
                <div class="col-xl-2 col-sm-3 mb-5" style="height: 5rem;margin-top: 2px">
                <div class="card border-dark mb-3 text-black o-hidden h-100">
                <div class="card-body">
                 <a href="#"><p style="font-size: 12px;margin-top: 2px">{{$evts->date}}</p></a>
                <div class="mr-5"></div>
                </div>
              
            </div>
        </div>
        @endforeach
      </div> 

                     <!--  <a href="#modalForm" data-toggle="modal" class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px" data-href="{{url('laravel-crud-search-sort-ajax-modal-form/create')}}"> Refer</a>-->
                </div>

              </div>
            </div>

<!--modal for Refer Button-->
               <div class="modal fade" id="linkEditorModal" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content"  style="width:980px;">
                        <div class="modal-header">
                            <h4 class="modal-title" id="linkEditorModalLabel">Referal Slip (Two Way Referal System)</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
                               <table style="width:100%">
                                <tr>
                                <td style="width:25%">Last Name:</th>
                                <td style="width:25%">{{$pats->lname}}</td>
                                <td style="width:25%" colspan="2" rowspan="2">Address: &emsp;{{$pats->address->street}} {{$pats->address->barangay}} {{$pats->address->city}}</td>
                                </tr>
  
                                <tr>
                                <td style="width:25%">First Name:</td><td style="width:25%"> {{$pats->fname}}</td>
                                  </tr>
  
                                 <tr>
                                  <td style="width:25%">Case New( ) old ( )</td>
                                  <td style="width:25%">Middle initial:  &emsp; {{$pats->mname}}</td>
                                  <td style="width:25%">Contact Number:</td>
                                  <td style="width:25%">{{$pats->contact}}</td>
                                </tr>
  
                                <tr>
                                <td style="width:25%">Age:</td>
                                <td style="width:25%">{{$pats->age}}</td>
                                <td style="width:25%">Gender:</td>
                                <td style="width:25%">{{$pats->gender}}</td>
                                </tr>
  
                                  <tr>
                                  <td style="width:25%">Birthdate:</td>
                                  <td style="width:25%">{{$pats->birthdate}}</td>
                                  <td style="width:25%">Date of referral:</td>
                                  <td style="width:25%"><input style="width: 230px;" type="date" value="<?php echo $today; ?>" id="refDate" name="refDate"></td>
                                  </tr>
                                  
                                  <tr>
                                  <td style="width:25%" height="70px">Refered at:</td>
                                  <td style="width:25%"><input type="text" style="height:70px; width: 230px;"  id="refAt" name="refAt"  /></td>
                                  <td style="width:25%">Reason for Referral:</td>
                                  <td style="width:25%"><input style="height:70px; width: 230px;" type="text" id="reason" name="reason" /></td>
                                  </tr>
                                  
                                  <tr>
                                  <td style="width:25%">Contact Person:</td>
                                  <td style="width:25%"><input style="width: 230px;" type="text" id="contact" name="contact"></td>
                                  <td style="width:25%">Refered by: </td>
                                  <td style="width:25%"><input  style="width: 230px;" type="text" id="refby" name="refby" value="{{Auth::user()->id}}" hidden="hidden"><input  style="width: 230px;" type="text" id="refby2" name="refby2" value="{{Auth::user()->fname}} {{Auth::user()->lname}}" disabled="disabled"></td>
                                  </tr>
                                  
                                  <tr>
                                  <td height="70px" colspan="4"><label> Recommendation/Attachments: </label> &emsp;<input style="height:70px; width: 670px;" type="text" id="ref_recom" name="ref_recom"/></td>
                                  </tr>
                                  
                                  <tr>
                                  <td style="width:25%">Refered back on(date)</td>
                                  <td style="width:25%"><input style="width: 230px;" type="date" id="refDateback" name="refDateback" ></td>
                                  <td style="width:25%">Refered back by:</td>
                                  <td style="width:25%"><input style="width: 230px;" type="text" id="refbyback" name="refbyback" /></td>
                                  </tr>
                                  
                                  <tr>
                                  <td style="width:25%" height="70px">Accepted by:</td>
                                  <td style="width:25%"></td>
                                  <td style="width:25%">Referal slip return on</td>
                                  <td style="width:25%"><input style="width: 230px;" type="date" id="returnDate" name="returnDate" ></td>
                                  </tr>
                                  
                                  
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" name ="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="id" name="id" value="0">
                            <input type="hidden" id="patient_id" name="patient_id" value="{{$pats->id}}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        
          @endif
        @endforeach
      @endif
  
@endsection

@section('script')
<script>
      
  $(document).ready(function () {
    ////----- Open the modal to CREATE a link -----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#linkEditorModal').modal('show');
    });

        $('#btn-accept').click(function () {
          alert('Accept');
    });

        $('body').on('click', '.open-modal', function () {
        var refer_id = $(this).val();

        $.get('{{URL::to("/refers")}}' + '/' + refer_id, function (data) {
            $('#id').val(data.id);
            $('#refDate').val(data.ref_date);
            $('#reason').val(data.ref_reason);
            $('#refby2').val(data.ref_by);
            $('#ref_recom').val(data.ref_reason);
            $('#contact').val(data.recommen);
            $('#refDateback').val(data.ref_back_date);
            $('#refbyback').val(data.ref_back_by);
            $('#returnDate').val(data.ref_slip_return);
            $('#btn-save').val("update");
            $('#linkEditorModal').modal('show');
            
        })
    });

        $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
         var formData = {
            //url: $('#link').val(),
            //description: $('#description').val(),
            patient_id: $('#patient_id').val(),
            ref_date:  $('#refDate').val(),
            ref_at: $('#refAt').val(),
            ref_reason:  $('#reason').val(),
            ref_by:  $('#refby').val(),
            recommen:  $('#ref_recom').val(),
            contact_person:  $('#contact').val(),
            ref_back_date:  $('#refDateback').val(),
            ref_back_by:  $('#refbyback').val(),
            ref_slip_return:  $('#returnDate').val(),
            accepted_by:  '1',

        };
       var state = $('#btn-save').val();
      console.log(formData);

       var type = "POST";
        var id = $('#id').val();
        var ajaxurl = '{{URL::to("/refers")}}';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'refers/' + refers;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var link = '<tr id="link' + data.id + '"><td>' + data.id + '</td><td>' + data.ref_date + '</td><td>' + data.ref_at + '</td><td>' + data.ref_reason + '</td><td>' + data.ref_by + '</td>';
                link += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
               // link += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#links-list').append(link);
                } else {
                    $("#link" + link_id).replaceWith(link);
                }
    
                $('#modalFormData').trigger("reset");
                $('#linkEditorModal').modal('hide')
        },
           error: function (data) {
                console.log('Error:', data);
            }

      });
      });

  })

  function getDate(){
    var today = new Date();

document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);


}
  </script>
@endsection