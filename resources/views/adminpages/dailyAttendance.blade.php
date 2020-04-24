@extends('layouts.master')
@section('title','Daily Attendance')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->

<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection


@section('page-name', 'Daily Attendance')

@section('main-content')

{{-- <form id="Report-form" action="" method="GET"> --}}
<div class="row align-items-center input-datepicker">
  <div class="form-group col-md-4">
    <label class="">Employees by Department</label>
    <select class="form-control  mb-2" id="attendance_department" name="attendance_department">
      <option value="">All Employees</option>
      @foreach ($departments as $department)
      <option value="{{$department->id}}">{{$department->department_name}}</option>
      @endforeach
    </select>
  </div>


  <div class="col-md-4 form-group">
    <label for="inlineFormInput">Attendance Date</label>
    <input type="date" class="form-control mb-2" id="attendance_date" name="attendance_date"
      placeholder="Atttendance Date" />
  </div>
  <div class="col-md-4 form-group align-items-end">
    <button type="button" class="btn btn-primary mt-4" name="filter_attendance" id="filter_attendance">Generate
      Attendance</button>
  </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
  </div>
  {{-- {!! Form::open(['action'=>'AdminController@storeAttendance', 'method'=>'POST', 'class'=>'myform']) !!}
  @csrf --}}
  <div class="card-body">
    {{-- <input id="selectAll" type="text" value=""> --}}
    <div class="table-responsive" id="">
      <table class="text-center table-bordered table" width="100%" cellspacing="0" id="attendance_table">
        <thead>
          <tr>
            <th> Serial</th>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Department Name</th>
            <th>Date</th>
            <th>Status</th>

          </tr>
        </thead>
        <tfoot>
          <tr>
            <th> Serial</th>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Department Name</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>
         
        </tbody>
      </table>
    </div>
    <div class="mt-3  text-center ">
      <button type="submit" class="btn btn-success"> Submit Attendance</button>
    </div>
  </div>
  {{-- {!! Form::close() !!} --}}
</div>




@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/attendace.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="/js/demo/datatables-demo.js"></script> --}}


@endsection