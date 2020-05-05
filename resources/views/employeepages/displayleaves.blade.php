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
    <div class="card-body payslip_list">
        <div class="table-responsive" id="">
            <table class="hover table-bordered table" width="100%" cellspacing="0" id="payslip_table">
                <thead>
                    <tr>
                        <th> Serial</th>
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>Duration</th>
                        <th>Leave Status</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>

@endsection