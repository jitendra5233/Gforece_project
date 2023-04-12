

@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Edit Trainer')

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
<script type="text/javascript" src="{{asset(' assets/richtexteditor/plugins/all_plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/richtexteditor/rte-upload.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mobiscroll.javascript.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/mobiscroll.javascript.min.css')}}" />
@section('content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoyZ_yVsI5N8KhjbWRyQeme1Pfz2DRYYc&libraries=places&callback=initAutocomplete"></script>
<style>
    .form-check-input[type=checkbox] {
        border: 1px solid #00000061;
    }
    .error{
      color:red;
    }
    .AceSelected{
    border: 4px solid #04917a
  }
   
</style>
<div class="row">
    <div class="col-md-12">

        <div class="card mb-4">
          <h5 class="card-header">Edit Trainer</h5>
          <!-- Account -->
          <div class="card-body">
              <div class="row">
              <input type="hidden" name="proid" id="proid" value="{{$getTrainer->id}}" />

              <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name *</label>
                    <input class="form-control" type="text" id="name" name="name"  value="{{$getTrainer->name}}" />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Branch Name *</label>
                    <select id="branch_id" name="branch_id" class="form-select"  aria-label="Default select example">
                      <option value="0" selected="">Select Branch</option>
                      @foreach($branch as $r)
                      <option value="{{$r->id}}" <?php echo $getTrainer->branch_id == $r->id ? 'selected' : null ?>>{{$r->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  
                  <div class="mb-3 col-md-6">
                    <label for="speciality" class="form-label">Speciality*</label>
                    <input class="form-control" type="text" id="speciality" name="speciality"  value="{{$getTrainer->speciality}}" />
                  </div>

                   <div class="mb-3 col-md-6">
                    <label for="title" class="form-label">Page Title *</label>
                    <input class="form-control" type="text" id="page_title" name="page_title"  value="{{$getTrainer->page_title}}" />
                  </div>
                     <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Page Description *</label>
                    <textarea id="page_description" name="page_description" class="form-control">{{$getTrainer->page_description}}</textarea>
                  </div>     
                  
                   <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Page Schema Json *</label>
                    <textarea id="page_schema" name="page_schema" class="form-control">{{$getTrainer->page_schema}}</textarea>
                  </div>  


                  <div class="mb-3 col-md-6">
                    <label for="exampleFormControlSelect1" class="form-label">Status *</label>
                    <select id="status" name="status" class="form-select"  aria-label="Default select example">
                      <option value="1" <?php echo $getTrainer->status=='1' ? 'selected' : '' ?>>Active</option>
                      <option value="0" <?php echo $getTrainer->status=='0' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                  </div>

                     <div class="mb-3 col-md-6">
                    <label for="image" class="form-label">Trainer Image *</label>
                    <input type="hidden" name="oldimage" id="oldimage" value="{{$getTrainer->image}}"/>
                    <input type="file" class="form-control" name="image" id="image"/>
                    </div>

            </div>
              </div>
          </div>

          <hr class="my-0">
          <div class="card-body">
              
            <div class="row">
                <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2" onclick="checkvalidate()" >Save changes</button>
              
                </div>
            </div>
        </div>
        <!-- /Notifications -->
      </div>
  </div>
<!--</form>-->



  <!-- /Account -->
        </div>
      </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

//Apply Validation and send data from View to Controller here after sertisfying all condetion
checkvalidate = () =>{
    let name =document.getElementById('name').value;
    let proid =document.getElementById('proid').value;
    let speciality =document.getElementById('speciality').value;
    let page_title =document.getElementById('page_title').value;
    let page_description =document.getElementById('page_description').value;
    let page_schema =document.getElementById('page_schema').value;
    let status =document.getElementById('status').value;
    let oldimage =document.getElementById('oldimage').value;
    var image =$('#image')[0].files;

    $(".error").remove();

    if(name.length < 1) {
    $('#name').after('<span class="error">This field is required*</span>');
    return false;
    }
      var branch_id=$('#branch_id');

      if(branch_id.val() == 0)
      {
      $('#branch_id').after('<span class="error">Select a Valid Branch Name*</span>');
      return false; 
      }

    if(speciality.length < 1) {
    $('#speciality').after('<span class="error">Speciality is required*</span>');
    return false;
    }
    if(page_title.length < 1) {
    $('#page_title').after('<span class="error">Page Title is required*</span>');
    return false;
    }

    if(page_description.length < 1) {
    $('#page_description').after('<span class="error">Page Description  is required*</span>');
    return false;
    }
    if(page_schema.length < 1) {
    $('#page_schema').after('<span class="error">Page Schema  is required*</span>');
    return false;
    }

  else{

     // Send Data with axios ajax code here ...

            let data = new FormData;
            data.append('name',name);
            data.append('proid',proid);
            data.append('branch_id',branch_id);
            data.append('speciality',speciality);
            data.append('page_title',page_title);
            data.append('page_description',page_description);
            data.append('page_schema',page_schema);
            data.append('image',image[0]);
            data.append('oldimage',oldimage);
            data.append('status',status);
            axios.post('{{ENV("APP_URL")}}/updateTrainer',data).then((result) => {
            if(result.data == 1)
            {
            Swal.fire(
                '',
                'Trainer Update Successfully',
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
  //Genrate autocomplete map code Here...
  function init() {
    var input = document.getElementById("location");
    var autocomplete = new google.maps.places.Autocomplete(input);
  }

  google.maps.event.addDomListener(window, "load", init);
</script>


@endsection

