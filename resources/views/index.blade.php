
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
   .left-margin-form{
    padding-left: 7px;
   }
   .submit{
       margin-top: 40px;
   }
   .sjahkjdgf{
       margin-left: 40px;
   }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Quantam It - Task </b></a>
      </div>
              @if(Session::has('success'))
                  <div class="alert alert-success">{{session::get('success') }}</div>
              @endif
            <div class="col-lg-7 mt-7 mt-lg-2 d-flex align-items-stretch">

              <form action="{{route('admin_login')}}" method="post" >
              @csrf
              <div class="row left-margin-form">
                <div class="form-group">
                  <label for="email">Your Email</label>
                  <input type="email" class="form-control" name="email" >
                </div>


              <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="password">
              </div>
                @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              <br>
              <div class="text-center sjahkjdgf"><button type="submit">Login</button></div>
            </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <div class="text-center submit"><H4>Submitted By Pradyum Jaiswal</H4></div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
