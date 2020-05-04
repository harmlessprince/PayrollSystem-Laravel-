@extends('layouts.master')
@section('title','Payslip Invoice')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .list-group-item {
        padding: .1rem 1rem;
        border: 0;
    }
</style>
@endsection

@section('page-name', 'Payslip Invoice')

@section('main-content')
<div class="card">
    <div class="card-body ">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Employee ID:</strong> justo odio </li>
                    <li class="list-group-item"><strong>Department: </strong> justo odio </li>
                    <li class="list-group-item"><strong>Phone Number: </strong> justo odio </li>
                    <li class="list-group-item"><strong>Date</strong> justo odio </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name:</strong> justo odio </li>
                    <li class="list-group-item"><strong>Designation: </strong> justo odio </li>
                    <li class="list-group-item"><strong>Account Number: </strong> justo odio </li>
                    <li class="list-group-item"><strong>Email: </strong> justo odio </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Payslip No:</strong> justo odio </li>
                    <li class="list-group-item"><strong>Payslip Status: </strong> justo odio </li>
                    <li class="list-group-item"><strong>Method Of Payment: </strong> justo odio </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/payslip.js"></script>
{{-- <script src="/vendor/parsley.js"></script> --}}
<script src="http://parsleyjs.org/dist/parsley.js"></script>

@endsection