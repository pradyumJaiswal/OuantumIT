@extends('layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content myform-box">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ route('profile.show', $my_Emp->Profile) }}" alt="Profile Picture">
                </div>
                <h3 class="profile-username text-center">{{ $my_Emp->F_name}} {{ $my_Emp->L_name}}</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $my_Emp->Email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">{{ $my_Emp->Phone}}</a>
                  </li>

                </ul>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            </div>
            </div>
</section>
</div>
            @endsection
