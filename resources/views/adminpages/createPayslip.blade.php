@extends('layouts.master')
@section('title','Daily Attendance')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection


@section('page-name', 'Daily Attendance')

@section('main-content')
<div class="row align-items-center input-datepicker">
    {{-- {{ csrf_token() }} --}}
    <div class="form-group col-md-3">
        <label class="">Departments</label>
        <select class="form-control departments mb-2" id="department_name" data-dependent="employee_name"
            name="departments">
            <option value="">Select employee department</option>
            @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->department_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label class="">Employee Names</label>
        <select class="form-control  mb-2" id="users" name="users">
            <option value="">Select employee name</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label class="">Select Year</label>
        <select class="form-control  mb-2" id="years" name="">
        </select>
    </div>
    <div class="form-group col-md-2">
        <label class=""> Select Month </label>
        <select class="form-control  mb-2" id="months" name="">
        </select>
    </div>

    <div class="col-md-2 form-group align-items-end">
        <button type="button" class="btn btn-primary mt-4" name="" id="">Generate
            Payslip</button>
    </div>
    <div class="text-primary" role="status" id="loader">
        <span class="sr-only">Loading...</span>
    </div>
</div>




@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/payslip.js"></script>

@endsection