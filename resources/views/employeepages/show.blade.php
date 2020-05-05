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
    .slip_logo{
        height:  5em;
    }
   
</style>
@endsection

@section('page-name', 'Payslip Invoice')

@section('main-content')
<div class="card">
    <div class="card-body ">
        <div class="row text-center ">
            <div class="col-md-4 mx-auto ">
                <img src="/vendor/logo.png" alt="" srcset="" class="slip_logo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Employee ID:</strong> {{$payslip->user->id}} </li>
                    <li class="list-group-item"><strong>Department:
                        </strong>{{$payslip->user->department->department_name}} </li>
                    <li class="list-group-item"><strong>Phone Number: </strong> {{$payslip->user->phone_number}} </li>
                    <li class="list-group-item"><strong>Date</strong> {{ date('d-m-Y') }} </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name:</strong> {{$payslip->user->employee_name}} </li>
                    <li class="list-group-item"><strong>Designation:
                        </strong>{{$payslip->user->designation->designation_name}} </li>
                    <li class="list-group-item"><strong>Account Number: </strong>
                        {{$payslip->user->account->account_number}} </li>
                    <li class="list-group-item"><strong>Email: </strong> {{$payslip->user->email}} </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Payslip No:</strong><span class="text-uppercase">
                            {{$payslip->id}}{{$payslip->slip_number}} </span></li>
                    <li class="list-group-item"><strong>Payslip Status: </strong>
                        @if ($payslip->status == false )
                        Unpaid
                        @else
                        Paid
                        @endif
                    </li>
                    <li class="list-group-item"><strong>Method Of Payment: </strong> {{$payslip->methodOfPayment}} </li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Basic Salary</td>
                            <td>₦ {{$payslip->basic_salary}}</td>
                        </tr>

                        @foreach ($payslip->user->allowances as $allowance)
                        <tr>

                            <td>{{$allowance->pivot->allowance_name}}</td>
                            <td>₦ {{$allowance->pivot->allowance_value}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col">Total Earnings</th>
                            <th scope="col">₦
                                @php
                                $sum = 0;
                                foreach ($payslip->user->allowances as $allowance){
                                $sum = $sum + $allowance->pivot->allowance_value ;
                                }
                                $total_earnings = $sum + $payslip->basic_salary;
                                echo $total_earnings;
                                @endphp
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-6 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Deduction</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($payslip->user->deductions as $deduction)
                        <tr>

                            <td>{{$deduction->pivot->deduction_name}}</td>
                            <td>₦ {{$deduction->pivot->deduction_value}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col">Total deductions</th>
                            <th scope="col">₦
                                @php
                                $sum = 0;
                                foreach ($payslip->user->deductions as $deduction){
                                $sum = $sum + $deduction->pivot->deduction_value ?? '';
                                }
                                $total_deductions = $sum;
                                echo $total_deductions;
                                @endphp
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p> <strong>Net Pay:</strong> ₦
                    @php
                    echo $total_earnings - $total_deductions ?? '';
                    @endphp
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="row text-center">
            <div class="col">
                <a id="" class="btn btn-primary mb-4 mr-3" href="/print/payslip/{{$payslip->id}}" role="button">Preview Slip</a>
                {{-- <a id="" class="btn btn-success mb-4 ml-3" href="#" role="button">Generate PDF</a> --}}
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