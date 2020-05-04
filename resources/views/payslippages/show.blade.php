@extends('layouts.master')
@section('title','Payslip Invoice')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .list-group-item {
        padding: .1rem;
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
                    <li class="list-group-item"><strong>Employee ID:</strong> {{$payslip->user->id}} </li>
                    <li class="list-group-item"><strong>Department: </strong>{{$payslip->user->department->department_name}} </li>
                    <li class="list-group-item"><strong>Phone Number: </strong> {{$payslip->user->phone_number}} </li>
                    <li class="list-group-item"><strong>Date</strong> {{ date('d-m-Y') }} </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name:</strong> {{$payslip->user->employee_name}}  </li>
                    <li class="list-group-item"><strong>Designation: </strong>{{$payslip->user->designation->designation_name}}  </li>
                    <li class="list-group-item"><strong>Account Number: </strong> {{$payslip->user->account->account_number}}  </li>
                    <li class="list-group-item"><strong>Email: </strong> {{$payslip->user->email}}  </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" class="text-upperCase"><strong>Payslip No:</strong> {{$payslip->id}}{{$payslip->slip_number}} </li>
                    <li class="list-group-item"><strong>Payslip Status: </strong>
                        @if ($payslip->status = 0 )
                            Unpaid
                        @else
                            Paid 
                        @endif
                        </li>
                    <li class="list-group-item"><strong>Method Of Payment: </strong> {{$payslip->methodOfPayment}} </li>
                </ul>
            </div>

            <div class="col-md-12">
                <div class="row text-center">
                    <div class="col">
                        <a id="" class="btn btn-primary mr-3" href="#" role="button">Print</a>
                        <a id="" class="btn btn-success ml-3" href="#" role="button">Generate PDF</a>
                    </div>
                </div>
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