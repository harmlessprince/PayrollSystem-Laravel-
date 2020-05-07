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
                    @include('flash-message')

                    @forelse ($data as $data)
                        @foreach ($data->leaves as $index => $leave)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$data->employee_name ?? ''}}</td>

                            <td>{{$leave->pivot->leave_type}}</td>
                            <td> {{$leave->pivot->from_date ?? ''}} To {{$leave->pivot->to_date ?? ''}}</td>
                            <td>@if($leave->pivot->status)
                                <button href="#" class="btn btn-sm btn-success">Approved</button>
                                @else
                                <button href="#" class="btn btn-sm btn-warning">Pending</button>
                                @endif
                            </td>
                            <td>{{$leave->pivot->description ?? ''}}</td>

                        </tr>
                        @endforeach
                    @empty
                    <tr>
                        <td> <p class="text-danger text-white p-1">No Leave</p></td>
                        <td> <p class="text-danger text-white p-1">No Leave</p></td>
                        <td> <p class="text-danger text-white p-1">No Leave</p></td>
                        <td> <p class="text-danger text-white p-1">No Leave</p></td>
                        <td> <p class="text-danger text-white p-1">No Leave</p></td>
                        <td> <p class="text-danger text-white p-1">No Leave</p></td>
                    </tr>
                   
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
<script src="/vendor/leave.js"></script>

@endsection