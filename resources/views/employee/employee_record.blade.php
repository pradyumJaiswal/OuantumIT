@extends('layout')

@section('content')
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<!-- @if(session('status'))
            <h4 class="alert-warning"> {{session('status')}}</h4>
        @endif -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Add Employees<sup style="font-size: 20px"></sup></h3>

                <!-- <p>Employees</p> -->
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ URL::to('Employee/create') }}" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->

          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="card-body p-0">
                <table class="table table-striped " id="my_skill_table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th style="width: 10px">Profile</th>
                      <th>Employee Name</th>
                      <th>Company</th>
                      <th style="width: 40px">View</th>
                      <!-- <th style="width: 40px">Profile</th> -->
                      <th style="width: 40px">Edit</th>
                      <th style="width: 40px">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($employee as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ route('profile.show', $item->Profile) }}" alt="Profile Picture" style="max-width: 100px;">
                        </td>
                        <td>{{ $item->F_name }} {{ $item->L_name }}</td>
                        <td>{{ $item->Email }}</td>
                        <td>
                            <a href="{{ url('Employee/'.$item->id) }}" class="btn btn-block btn-outline-primary bg-blue">View</a>
                        </td>
                        <td>
                            <a href="{{ url('Employee/'.$item->id.'/edit') }}" class="btn btn-block btn-outline-primary bg-blue">Update</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-block btn-outline-primary bg-danger delete-btn" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">Delete</button>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirm Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this employee?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ url('Employee/'.$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <tr>
                        <td colspan="7" class="text-center">
                            <!-- Display Pagination Links -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination" style="justify-content: center;">
                                    @foreach ($employee->links()->elements[0] as $page => $url)
                                    <li class="page-item{{ $employee->currentPage() == $page ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </td>
                    </tr>

                  </tbody>
                </table>
              </div>
      </div>

</div>
</div>
</div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Skills</h3>
              </div>
              <!-- /.card-header -->

</div>
@endsection
