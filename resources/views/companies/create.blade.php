@extends('layout')

@section('content')

<div class="content-wrapper">
<section class="content myform-box">
      <div class="container-fluid">

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Company</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action=" {{ url('Company')}}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="Name" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group">
                    <label for="companyInputEmail1">Email</label>
                    <input type="email" class="form-control" name="Email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Website</label>
                    <input type="text" class="form-control" name="Website" placeholder="Enter Website">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Logo</label>
                    <input type="text" class="form-control" name="Logo" placeholder="Enter Website">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" >
                       <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                       <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>


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
