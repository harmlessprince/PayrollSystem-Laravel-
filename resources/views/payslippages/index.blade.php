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

@section('page-name', 'Payslip')

@section('main-content')
@include('flash-message')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form action="/load-payslips" method="get">
        @csrf
        <div class="card">
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="year">Year</label>
                            <select class="form-control" name="year" id="years">
                                <option disabled selected>------select-----</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="month">Month</label>
                            <select class="form-control" name="month" id="months">
                                <option disabled selected>------select-----</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mt-1 text-center">
                        <div class="form-group mt-1">
                            <button type="submit" class="btn btn-primary mt-4 fetch_payslips">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <div class="card-body payslip_list">
        <div class="table-responsive" id="">
            <table class="hover table-bordered table" width="100%" cellspacing="0" id="payslip_table">
                <thead>
                    <tr>
                        <th> Serial</th>
                        <th>Employee Name</th>
                        <th>Summary</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> Serial</th>
                        <th>Employee Name</th>
                        <th>Summary</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Status</th>
                        <th>Actions</th>
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
<script src="/vendor/payslip.js"></script>
{{-- <script src="/vendor/parsley.js"></script> --}}
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
{{-- <script src="/js/demo/datatables-demo.js"></script> --}}

@endsection