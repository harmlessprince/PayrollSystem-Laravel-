@extends('layouts.master')
@section('title','Daily Attendance')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .card {
        border: 0px;
        border-top: 1px solid #e3e6f0;
        border-radius: 0rem;
        /* background-color: #F8F9FC; */
    }

    .list-group-item {
        /* background-color: #F8F9FC; */
        border: 0px;
    }

    .noHover:hover {
        border: none;
    }

    .slip-title{
        margin-right: 19em;
    }

    .col,
    .col-1,
    .col-10,
    .col-11,
    .col-12,
    .col-2,
    .col-3,
    .col-4,
    .col-5,
    .col-6,
    .col-7,
    .col-8,
    .col-9,
    .col-auto,
    .col-lg,
    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-lg-auto,
    .col-md,
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-auto,
    .col-sm,
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-auto,
    .col-xl,
    .col-xl-1,
    .col-xl-10,
    .col-xl-11,
    .col-xl-12,
    .col-xl-2,
    .col-xl-3,
    .col-xl-4,
    .col-xl-5,
    .col-xl-6,
    .col-xl-7,
    .col-xl-8,
    .col-xl-9,
    .col-xl-auto {
        padding-left: 0rem;
    }

    .payslip-modal {
        padding: 0rem;
    }
</style>
@endsection


@section('page-name', 'Generate Payslip')

@section('main-content')
<div class="row align-items-center">
    {{-- {{ csrf_token() }} --}}
    <div class="card col-md-6 mx-auto">
        <div class="card-body">
            <div class="form-group">
                <label class="">Departments</label>
                <select class="form-control departments mb-2" id="department_name" data-dependent="employee_name"
                    name="department_name">
                    <option disabled selected="true">-----Select----</option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <label class="">Employee Names</label>
                <select class="form-control  mb-2" id="users" name="users">
                    <option disabled selected="true">-----Select-----</option>
                </select>
            </div>
           
        </div>
        <!-- Button trigger modal -->
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary mt-4" id="generate_payslip" data-toggle="modal"
                data-target=".bd-example-modal-lg">Generate
                Payslip</button>
        </div>
    </div>

    <div class="text-primary" role="status" id="loader">

    </div>

    

    


</div>

<!-- Modal -->
<form action="/store/payslip" method="POST">
    @csrf
    <div class="modal fade  bd-example-modal-lg" id="exampleModalScrollable " tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">

            <div class="modal-content payslip-modal">
                <div class="modal-header">
                    
                    <h5 class="modal-title slip-title" id="exampleModalScrollableTitle">Employee Payslip</h5>
                    <h5 class="modal-title " id="exampleModalScrollableTitle">Payslip ID: <span class="font-weight-bold text-uppercase" id="payslip-id"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                    <div class="row">
                        
                        <input type="hidden" name="user_id" id="user_id" readonly />
                      
                      
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-7 mx-auto">
                            <div class="">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Basic</label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">N</span>
                                                </div>
                                                <input type="text" id="basic_salary" name="basic_salary"
                                                    class="form-control" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Total Allowance</label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">N</span>
                                                </div>
                                                <input type="text" class="form-control total_allowance "
                                                    id="total_allowance" name="total_allowance" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Total Deduction</label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">N</span>
                                                </div>
                                                <input type="text" id="total_deduction" name="total_deduction"
                                                    class="form-control total_deduction" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Net Salary</label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="">N</span>
                                                </div>
                                                <input type="text" id="total_salary" name="total_salary"
                                                    class="form-control" readonly />
                                            </div>
                                            {{-- <button type="button" class="btn btn-primary sumSalary">Calculate Net
                                                Salary</button> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label"> Payment method</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="methodOfPayment" id="methodOfPayment">
                                                <option disabled selected="true"> ------Select -----</option>
                                                <option value="cash">Cash</option>
                                                <option value="bank">Bank</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="status" id="status">
                                                <option disabled selected="true">------Select-----</option>
                                                <option value="1">Paid</option>
                                                <option value="0">Unpaid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="" class="col-sm-4 col-form-label"> Year</label>
                                        <div class="col-sm-8">
                                            <select class="form-control year  mb-2" id="years" name="payslip_year">
                                                <option disabled selected="true"> -----Select-----</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4  col-form-label"> Month </label>
                                        <div class="col-sm-8">
                                            <select class="form-control  mb-2 month" name="payslip_month" id="months">
                                                <option disabled selected="true"> ------Select-----</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Comments</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="comment" id="comment"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="create-slip" class="btn btn-primary">Create Payslip</button>
                </div>

            </div>

        </div>
    </div>
</form>




@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/payslip.js"></script>

@endsection