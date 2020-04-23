@extends('layouts.master')
@section('title','Daily Attendance')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('page-name', 'Daily Attendance')

@section('main-content')

<form id="Report-form" action="" method="GET">
  <div class="form-row align-items-center">
    <div class="form-group col-md-4">
      <label class="">Employees by Department</label>
      <select class="form-control  mb-2" id="attendanceType" name="attendanceType">
        <option value="0">All Employees</option>
        
      </select>
    </div>


    <div class="col-md-4 form-group">
      <label for="inlineFormInput">Name</label>
      <input type="date" class="form-control mb-2" id="datePicker" name="datePicker">
    </div>
    <div class="col-auto form-group">
      <button type="submit" class="btn btn-primary mt-4">Generate Attendance</button>
    </div>
  </div>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive" id="">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Serial</th>
            <th>Employee Name</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th> Serial</th>
            <th>Employee Name</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/attendace.js"></script>
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>


@endsection