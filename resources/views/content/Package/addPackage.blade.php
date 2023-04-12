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
<style>
    .form-check-input[type=checkbox] {
        border: 1px solid #00000061;
    }
    .error{
      color:red;
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
          <h5 class="card-header">New Package</h5>
          <div class="card-body">
            <form action="{{ENV('APP_URL')}}/submitPackage" method="post" onsubmit="return handleSubmit()">
              @csrf
              <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="packageName" class="form-label">Package Name</label>
                    <input class="form-control" type="text" id="packageName" name="packageName" value="" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control" type="text" id="price" name="price" value="" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="credit" class="form-label">Credit</label>
                    <input class="form-control" type="text" id="credit" name="credit" value="" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="expire" class="form-label">Expire</label>
                    <input class="form-control" type="text" id="expire" name="expire" value="" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="branch" class="form-label">Branch</label>
                    <select  class="form-select" id='branch' name='branch'>
                      @foreach($tableData as $r)
                      <option value="{{$r->id}}">{{$r->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image" value="" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="limit" class="form-label">Package Limit</label>
                    <input class="form-control" type="text" id="limit" name="limit" value="" />
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="description" class="form-label">Description</label>
                   <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="mb-3 col-md-12">
                     <button type="submit" class="btn btn-primary me-2">Add Package</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
<div class="loader"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoyZ_yVsI5N8KhjbWRyQeme1Pfz2DRYYc&libraries=places&callback=initAutocomplete"></script>

<script>
    handleSubmit = () =>{
        let packageName = document.getElementById('packageName').value;
        let price = document.getElementById('price').value;
        let credit = document.getElementById('credit').value;
        let expire = document.getElementById('expire').value;
        let branch = document.getElementById('branch').value;
        let image = document.getElementById('image').value;
        let description = document.getElementById('description').value;
        let limit = document.getElementById('limit').value;

        if(packageName == '' || packageName == null){
          showError();
          return false; 
        }else if(price == '' || price == null){
          showError();
          return false; 
        }else if(credit == '' || credit == null){
          showError();
          return false; 
        }else if(expire == '' || expire == null){
          showError();
          return false; 
        }else if(branch == '' || branch == null){
          showError();
          return false; 
        }else if(image == '' || image == null){
          showError();
          return false; 
        }else if(limit == '' || limit == null){
          showError();
          return false; 
        }else if(description == '' || description == null){
          showError();
          return false; 
        }else{
          return true;
        }

        // let data = new FormData()
        // data.append('name',name);
        // data.append('location',location);
        
        // axios.post('{{ENV("APP_URL")}}/api/submitBranch',data).then((result) => {
        //     console.log(result);
        // }).catch((err) => {
        //     console.log(err)
        // });
    }


    showError = () =>{
      alert('error');
    }

</script>

@endsection

