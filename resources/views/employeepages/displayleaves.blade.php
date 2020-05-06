@extends('layouts.master')
@section('title','All Payslips')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    table.dataTable tbody tr:hover {
        background-color: #c5cae9 !important;
    }
</style>
@endsection

@section('page-name', 'Manage Leave')

@section('main-content')
@include('flash-message')

<!-- DataTales Example -->


<div class="card shadow mb-4">
    
    <div class="card-body">
        <div class="table-responsive" id="">
            <table class="hover text-center table-bordered table" width="100%" cellspacing="0" id="leave_list">
                <thead>
                    <tr>
                        <th> Serial</th>
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>Duration (Year-Month-Day)</th>
                        <th>Leave Status </th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($leaves as  $index =>  $leave)
                    <tr>
                    <td>{{$index+1}}</td>
                      <td>{{$leave->user->employee_name}}</td>
                      <td class="text-capitalize">{{$leave->leave_type}}</td>
                      <td> {{$leave->from_date}} To {{$leave->to_date}}</td>
                      <td>@if($leave->status)
                        <button href="#" class="btn btn-sm btn-success">Approved</button>
                        @else
                        <button href="#" class="btn btn-sm btn-warning">Pending</button>
                        @endif
                      </td>
                      <td>{{$leave->description}}</td>
                   
                      @endforeach
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
<script src="/vendor/leave.js"></script>

@endsection