@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Add Trainer')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{asset('assets/richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{asset('assets/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/richtexteditor/plugins/all_plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/richtexteditor/rte-upload.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mobiscroll.javascript.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/mobiscroll.javascript.min.css')}}" />
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoyZ_yVsI5N8KhjbWRyQeme1Pfz2DRYYc&libraries=places&callback=initAutocomplete"></script>
<style>
    .form-check-input[type=checkbox] {
        border: 1px solid #00000061;
    }
    .AceSelected{
    border: 4px solid #04917a
  }
  .loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(images/loading2.gif) no-repeat center center;
  z-index: 10000;
}

</style>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">New Trainer</h5>
          <!-- Account -->
          <div class="card-body">
              <div class="row">
              <input value="{{ENV('APP_URL')}}/media/images/" id="imgurl" type="hidden"/>

              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name*</label>
                    <input class="form-control" type="text" id="name" name="name"  value="" />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="speciality" class="form-label">Speciality*</label>
                    <input class="form-control" type="text" id="speciality" name="speciality"  value="" />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="branch_id" class="form-label">Branch Name *</label>
                    <select id="branch_id" name="branch_id" class="form-select"  aria-label="Default select example">
                      <option value="0">Select Branch</option>
                      @foreach($tableData as $r)
                      <option value="{{$r->id}}">{{$r->name}}</option>
                      @endforeach
                    </select>
                  </div>

                   <div class="mb-3 col-md-6">
                    <label for="page_title" class="form-label">Page Title *</label>
                    <input class="form-control" type="text" id="page_title" name="page_title"  value="" />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Page Description *</label>
                    <textarea id="page_description" name="page_description" class="form-control"></textarea>
                  </div>     
                  
                   <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Page Schema Json *</label>
                    <textarea id="page_schema" name="page_schema" class="form-control"></textarea>
                  </div>  
            

                     <div class="mb-3 col-md-6">
                        <label for="exampleFormControlSelect1" class="form-label">Status *</label>
                        <select id="status" name="status" class="form-select"  aria-label="Default select example">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                     </div>

                 
                  <div class="mb-3 col-md-6">
                    <label for="image" class="form-label">Trainer Image *</label>
                    <input type="file" class="form-control" name="image" id="image"/>
                    </div>
                        
              </div>
          </div>
          <hr class="my-0">
          <div class="card-body">
              
            <div class="row">
                <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2"  onclick="checkvalidate()">Save changes</button>
                </div>
            </div>
        </div>
        <!-- /Notifications -->
      </div>
  </div>
<!-- </form> -->
  <!-- /Account -->
    </div>
  </div>
</div>
        </div>
      </div>
</div>
<div class="loader"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
   
    checkvalidate = () =>{

            var spinner = $('.loader');
            spinner.show();
      
            let name = document.getElementById('name').value;
            let speciality = document.getElementById('speciality').value;
            let page_title = document.getElementById('page_title').value;
            let page_description = document.getElementById('page_description').value;
            let page_schema = document.getElementById('page_schema').value;
            let status = document.getElementById('status').value;

              $(".error").remove();
              
              if(name.length < 1) {
              $('#name').after('<span class="error">This field is required*</span>');
              spinner.hide();
              return false;
              }

              if(speciality.length < 1) {
              $('#speciality').after('<span class="error">Speciality is required*</span>');
              spinner.hide();
              return false;
              }

              var branch_id=$('#branch_id');
              if(branch_id.val() == 0)
              {
              $('#branch_id').after('<span class="error">Select a Valid Branch Name*</span>');
              spinner.hide();
              return false; 
              }
              if(page_title.length < 1) {
              $('#page_title').after('<span class="error">Page Title is required*</span>');
              spinner.hide();
              return false;
              }

              if(page_description.length < 1) {
              $('#page_description').after('<span class="error">Page Description  is required*</span>');
              spinner.hide();
              return false;
              }
              if(page_schema.length < 1) {
              $('#page_schema').after('<span class="error">Page Schema  is required*</span>');
              spinner.hide();
              return false;
              }
              
              
              var image = $('#image')[0].files;
              if (image.length == 0) {
                $('#image').after('<span class="error">Trainer image is required*</span>');
                spinner.hide();
                return false;
              }

                else{

                      let data = new FormData;
                      data.append('name',name);
                      data.append('branch_id',branch_id);
                      data.append('speciality',speciality);
                      data.append('page_title',page_title);
                      data.append('page_description',page_description);
                      data.append('page_schema',page_schema);
                      data.append('image',image[0]);
                      data.append('status',status);
                      axios.post('{{ENV("APP_URL")}}/submit-Trainer',data).then((result) => {
                      if(result.data == 1)
                      {
                      spinner.hide(); 
                      Swal.fire(
                          '',
                          'Trainer Added Successfully',
                          'success'
                      )
                      .then((result) => {
                        window.location.href = '{{ENV("APP_URL")}}/allTrainerView';
                      });
                      }


                      }).catch((err) => {
                      console.log(err)
                      });
             
                  }


     }

</script>

<script>
  function init() {
    var input = document.getElementById("location");
    var autocomplete = new google.maps.places.Autocomplete(input);
  }

  google.maps.event.addDomListener(window, "load", init);
</script>

@endsection

