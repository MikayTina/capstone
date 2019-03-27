@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{URL::to('/showIntervention')}}">Intervention</a>
          </li>
          <li class="breadcrumb-item active">Intervention Creation</li>
        </ol>

          @include('flash::message')
        <!-- Icon Cards-->
    <div class="container">
    <div class="card card-register mx-auto mt-4">
      <div class="card-header">Create Intervention</div>
      <div class="card-body">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
        @endforeach
      @endif
        <form action="{{URL::to('/create_intervention')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="parent" class="form-control" placeholder="Parent Name" required="required" autofocus="autofocus" name="parent">
                  <label for="parent">Parent Intervention</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="intername" class="form-control" placeholder="Intervention Name" required="required" autofocus="autofocus" name="intername">
                  <label for="intername">Intervention Name</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input style="height:100px;" type="textbox" id="depdesc" class="form-control" placeholder="Intervention Description" required="required" name="depdesc">
              <label for="interdesc">Description</label>
            </div>
          </div>
           <input class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
        </form>
      </div>
    </div> 
  </div>
  
@endsection