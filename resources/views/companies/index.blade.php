@extends('layout')

@section('content')
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
        @if(session('status'))
            <h4 class="alert-warning"> {{session('status')}}</h4>
        @endif
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> Add Companies</h3>

                <!-- <p>Companies</p> -->
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ URL::to('Company/create') }}" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->

          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">S.No.</th>
                        <th>Logo</th>
                        <th>Company Name</th>
                        <th>Website</th>
                        <th style="width: 40px">Email</th>
                        <th style="width: 40px">Edit</th>
                        <th style="width: 40px">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach($company as $item)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->Logo) }}" alt="Company Logo" style="max-width: 50px;">

                        </td>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->Website }}</td>
                        <td>{{ $item->Email }}</td>
                        <td>
                            <a href="{{ url('Company/'.$item->id.'/edit') }}" id="update-skill-btn" class="btn btn-block btn-outline-primary bg-blue">Update</a>
                        </td>
                        <td>

                                <div id="deleteModal{{$item->id}}">
                                    <button type="button" class="btn btn-block btn-outline-primary bg-danger dlt-skill-btn" onclick="openDeleteModal({{$item->id}})">Remove</button>
                                </div>
                            </td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Confirm Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this company?
                                            </div>

                                            <div class="modal-body">
                                                Notice -  Your Employees Get Remove, if If you delete your Company !
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ url('Company/'.$item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                    </tr>
                    @php
                    $count++;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="7" class="text-center">
                            <!-- Display Pagination Links -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination" style="justify-content: center;">
                                    @foreach ($company->links()->elements[0] as $page => $url)
                                    <li class="page-item{{ $company->currentPage() == $page ? ' active' : '' }}">
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
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Skills</h3>
              </div>
              <!-- /.card-header -->

</div>
@endsection

