@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12 col-md-12 order-1">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Workshops</span>
            <h3 class="card-title mb-2">{{$totalworkshop}}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2" style="color: #03CEA4 !Important"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Active Workshop</span>
            <h3 class="card-title mb-2">{{$activeworkshop}}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Project Classes</span>
            <h3 class="card-title mb-2">{{$totalprojectclasses}}</h3>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2" style="color: #03CEA4 !important"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Active Project Classes</span>
            <h3 class="card-title mb-2">{{$activeprojectclasses}}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Open Classes</span>
            <h3 class="card-title mb-2">{{$totalopenclasses}}</h3>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2" style="color: #03CEA4 !Important"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Active Open Classes</span>
            <h3 class="card-title mb-2">{{$activeopenclasses}}</h3>
          </div>
        </div>
      </div>

      @if(session('role') == 'Admin')
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2" style="color: #03CEA4 !Important"><i class="fa-solid fa-user-plus" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Active Students</span>
            <h3 class="card-title mb-2">{{$students}}</h3>
          </div>
        </div>
      </div>
      @endif
      
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Branch</span>
            <h3 class="card-title mb-2">{{$totalbranch}}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info p-2"><i class="fa-solid fa-calendar-check" style="font-size:22px"></i></span>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Total Package</span>
            <h3 class="card-title mb-2">{{$package}}</h3>
          </div>
        </div>
      </div>
      
      
   <!-- Transactions -->
   
      <!--/ Transactions -->
    </div>
  </div>
</div>
@endsection