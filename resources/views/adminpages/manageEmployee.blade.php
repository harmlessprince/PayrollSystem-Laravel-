@extends('layouts.master')
@section('title','Manage Employees')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('page-name', 'Manage Employees')

@section('main-content')
@include('flash-message')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @forelse ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->employee_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->department->department_name ?? ''}}</td>
            <td>{{$user->designation->designation_name ?? ''}}</td>

            <td>@if($user->employee_status == 'active')
              <button href="#" class="btn btn-sm btn-success">Active</button>
              @else
              <button href="#" class="btn btn-sm btn-danger">Inactive</button>
              @endif
            </td>
            <td>
              
              <a href="/employee/{{$user->id}}" class="btn btn-sm btn-info" role="button">View</a>
              <a href="/employee/{{$user->id}}/edit" class="btn btn-sm btn-primary" role="button">Edit</a>
              <a href="/delete-employee/{{$user->id}}" class="btn btn-sm btn-danger" role="button">Delete</a>
            </td>
          </tr>
         
            @empty
            <h3>No users to display</h3>
            @endforelse
          

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
@endsection