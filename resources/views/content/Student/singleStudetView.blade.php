@extends('layouts/contentNavbarLayout')

@section('title', 'User  - Signle Student Details ')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

<link rel="stylesheet" href="{{asset('assets/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src='{{asset('assets/richtexteditor/plugins/all_plugins.js')}}'></script>
<script type="text/javascript" src='{{asset('assets/richtexteditor/rte-upload.js')}}'></script>
<style>
  .error{
    color:red;
  }
  #mydata
  {
    text-align:justify;
  }
  #myImg{
    height:100px;
    width:100px;
    margin-bottom:10px;
    float:right;
    margin-right:20px;
    margin-top:10px;

  }
</style>
@section('content')
<div class="row" style="align-items: center;">
  <div class="col-6">

    <h4 class="fw-bold py-3" style="margin:0">
      <span class="text-muted fw-light"> Student </span> 
    </h4>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
    <div class="row">
    <div class="mb-3 col-md-6">
      <h5 class="card-header">Student  Details</h5>
     </div>
      <div class="mb-3 col-md-6">
          <img  id="myImg" class="" src="{{ENV('APP_URL')}}/StudentImg/student.png" data-bigger-src="{{ENV('APP_URL')}}/StudentImg/student.png" disabled />
         </div>
       </div>
      <hr class="my-0">
      <div class="card-body">
        
          <div class="row">
         
          <div class="mb-3 col-md-6">
              <label for="firstname" class="form-label">First Name</label>
              <input class="form-control" type="text" id="firstname" name="firstname" value="{{$student[0]->firstname}}"  readonly/>
            </div>

            <div class="mb-3 col-md-6">
              <label for="middlename" class="form-label">Middle Name</label>
              <input class="form-control" type="text" id="middlename" name="middlename" value="{{$student[0]->middlename}}"  readonly/>
            </div>

            <div class="mb-3 col-md-6">
              <label for="lastname" class="form-label">Last Name</label>
              <input class="form-control" type="text" id="lastname" name="lastname" value="{{$student[0]->lastname}}"  readonly/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">email</label>
              <input class="form-control" type="text" name="email" id="email" value="{{$student[0]->email}}" readonly/>
            </div>

            <div class="mb-3 col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input class="form-control" type="text" name="phone" id="phone" value="{{$student[0]->phone}}" readonly/>
            </div>
            
            <div class="mb-3 col-md-6">
              <label for="dob" class="form-label">Birth Date</label>
              <input class="form-control" type="text" name="dob" id="dob" value="{{$student[0]->dob}}" readonly/>
            </div>

            <div class="mb-3 col-md-6">
              <label for="gender" class="form-label">Gender</label>
              <input class="form-control" type="text" name="gender" id="gender" value="{{$student[0]->gender}}" readonly/>
            </div>

            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Status</label>
              <div class="input-group input-group-merge">
                <input type="text" id="status" name="status"  value="<?php echo  $student[0]->status == '1' ? "Active" : "Inactive" ?>" class="form-control" readonly/>
              </div>
          </div>

          <div class="mb-3 col-md-12">
              <label for="address" class="form-label">Address</label>
              <input class="form-control" type="text" name="address" id="address" value="{{$student[0]->address}}" readonly/>
            </div>

            {!! QrCode::size(150)->generate($student[0]->id) !!}
         
        <!-- </form> -->

      </div>
      <!-- /Account -->
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

@endsection
