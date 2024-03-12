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
                <h3 class="card-title">Add Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action=" {{ url('Employee')}}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf

                    <div class="row">
                    <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="fName" placeholder="Enter First Name">
                  </div>
                  <div class="col-md-2"></div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lName" placeholder="Enter Last Name">
                  </div>
                    </div>


                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Company</label>
                    <input type="text" class="form-control" name="Company" placeholder="Enter Company Name">
                  </div> -->
                  <div class="form-group">
                  <label for="exampleSelectBorder">Company</label>
                  <select class="custom-select form-control" name="Company">
                    <option value="">Select a company</option> <!-- Optional default option -->
                    @php
                        $companies = DB::table('companies')->pluck('name', 'id');
                    @endphp
                    @foreach($companies as $companyId => $companyName)
                        <option value="{{ $companyId }}">{{ $companyName }}</option>
                    @endforeach
                </select>
                  <div class="form-group">
                    <label for="companyInputEmail1">Email</label>
                    <input type="email" class="form-control" name="Email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="companyInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" name="Phone" placeholder="Enter Phone Number">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="profile" >
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
