@extends('layouts.master')
@section('title','Apply For Leave')
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

@section('page-name', 'Apply for Leave')

@section('main-content')

<!-- DataTales Example -->

<div class="card   shadow mb-4">
    <form action="" method="get">
        @csrf
        <div class="card">
            <div class="mx-auto col-md-8">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="leave_type" class="col col-form-label"><strong>Leave Type</strong></label>
                        <div class="col">
                            <select class="form-control" name="year" id="">
                                <option disabled selected>------select-----</option>
                                <option value="medical">Medical</option>
                                <option value="casual">Casual</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="from"><strong> From </strong></label>
                            <div>
                                <input class="form-control" type="date" name="from_date" id="from_date">
                            </div>
                        </div>
                        <div class="col">
                            <label for="to"><strong> To</strong></label>
                            <div>
                                <div>
                                    <input class="form-control" type="date" name="to_date" id="to_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong> Description </strong></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col">
                            <a class="btn  btn-secondary" href="#">Cancle</a>
                            <a class="btn btn-warning" href="#">Reset</a>
                            <a class="btn btn-success" href="#">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/payslip.js"></script>
{{-- <script src="/vendor/parsley.js"></script> --}}
{{-- <script src="http://parsleyjs.org/dist/parsley.js"></script> --}}
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
{{-- <script src="/js/demo/datatables-demo.js"></script> --}}

@endsection