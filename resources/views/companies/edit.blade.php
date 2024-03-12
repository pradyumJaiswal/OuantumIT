@extends('layout')

@section('content')

<div class="content-wrapper">
<section class="content myform-box">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action=" {{ url('Company/'.$my_company->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <div class="card-body">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="Name" value="{{$my_company->Name}}">
                  </div>
                  <div class="form-group">
                    <label for="companyInputEmail1">Email</label>
                    <input type="email" class="form-control" name="Email" value="{{$my_company->Email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Website</label>
                    <input type="text" class="form-control" name="Website" value="{{$my_company->Website}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Logo</label>
                    <input type="file" class="form-control" name="Logo" value="{{$my_company->Logo}}">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group"> -->
                      <!-- <div class="custom-file"> -->
                        <!-- <input type="text" class="custom-file-input" name="logo" > -->
                       <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                       <!-- </div> -->
                      <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> -->
                    <!-- </div>
                  </div> -->
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>
</section>
</div>
@endsection
