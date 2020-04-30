@extends('layouts.master')
@section('title','Daily Attendance')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                    name="departments">
                    <option disabled selected="true">-----Select----</option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <label class="">Employee Names</label>
                <select class="form-control  mb-2" id="users" name="user_id">
                    <option disabled selected="true">-----Select-----</option>
                </select>
            </div>
            <div class="form-group">
                <label class=""> Year</label>
                <select class="form-control  mb-2" id="years" name="">
                    <option disabled selected="true"> -----Select-----</option>
                </select>
            </div>
            <div class="form-group">
                <label class=""> Month </label>
                <select class="form-control  mb-2" id="months" name="">
                    <option disabled selected="true"> ------Select-----</option>
                </select>
            </div>
        </div>
        <!-- Button trigger modal -->
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary mt-4" name="" id="generate_payslip" data-toggle="modal"
                data-target=".bd-example-modal-lg">Generate
                Payslip</button>
        </div>
    </div>

    <div class="text-primary" role="status" id="loader">

    </div>


</div>

<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content payslip-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Employee Payslip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <input type="hidden" name="" id="hidden_id" readonly />
                    <div class="col-md-6 noHover allAllowances" tabindex="0">
                        <h5 class="card-title">Allowances</h5>
                        <div class="card">
                            <div class="card-body payslip-modal">
                                <ul class="list-group allowance_container" id="allowance_list">
                                    <li class="list-group-item">
                                        <div class="row allowance_form">
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="" id="allowance_name">
                                                        <option disabled selected="true"> -----Select----</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="number" class="form-control allowance" name=""
                                                        id="allowance_value">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" id="addAllowance"
                                                    class="form-control btn  btn-sm btn-success">
                                                    <svg class="bi bi-plus-square" width="1em" height="1em"
                                                        viewBox="0 0 16 16" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z"
                                                            clip-rule="evenodd" />
                                                        <path fill-rule="evenodd"
                                                            d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z"
                                                            clip-rule="evenodd" />
                                                        <path fill-rule="evenodd"
                                                            d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Other Allowance</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control " name="" id=""
                                                placeholder="Allowance title">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="number" class="form-control allowance" name="" id=""
                                                placeholder="Allowance value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="allDeductions">
                        <h5 class="card-title">Deductions</h5>
                        <div class="card">
                            <div class="card-body payslip-modal">
                                <ul class="list-group deduction_container" id="deduction_list">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" name="" id="deduction_name">
                                                        <option disabled selected="true"> -----Select----</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="number" class="form-control deduction" name=""
                                                        id="deduction_value">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" id="addDeduction"
                                                    class="form-control btn  btn-sm btn-success">
                                                    <svg class="bi bi-plus-square" width="1em" height="1em"
                                                        viewBox="0 0 16 16" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z"
                                                            clip-rule="evenodd" />
                                                        <path fill-rule="evenodd"
                                                            d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z"
                                                            clip-rule="evenodd" />
                                                        <path fill-rule="evenodd"
                                                            d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h5 class="card-title">Other Deduction</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control " name=""
                                                placeholder="Deduction title">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="number" class="form-control deduction" name=""
                                                placeholder="Deduction value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <span class="input-group-text" id="">N</span>
                                            </div>
                                            <input type="text" id="basic_salary" class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Total Allowance</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">N</span>
                                            </div>
                                            <input type="text" class="form-control total_allowance" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Total Deduction</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">N</span>
                                            </div>
                                            <input type="text" id="total_deduction" class="form-control total_deduction"
                                                readonly />
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
                                            <input type="text" id="total_salary" class="form-control" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"> Payment method</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="" id="">
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
                                        <select class="form-control" name="" id="">
                                            <option disabled selected="true">------Select-----</option>
                                            <option value="paid">Paid</option>
                                            <option value="unpaid">Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Comments</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create Payslip</button>
            </div>
        </div>
    </div>
</div>





@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="https://unpkg.com/mustache@latest"></script>
<script src="/vendor/payslip.js"></script>

@endsection




<script id="template" type="x-tmpl-mustache">
    <div class="row">

        <div class="col-md-6">
            <h5 class="card-title">Allowances</h5>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group allowance_container" id="allowance_list">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" id="addAllowance" class="form-control btn  btn-sm btn-success">
                                        <svg class="bi bi-plus-square" width="1em" height="1em" viewBox="0 0 16 16"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <h5 class="card-title">Other Allowance</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name="" id="" placeholder="Allowance title">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="number" class="form-control" name="" id="" placeholder="Allowance value">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="card-title">Deductions</h5>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group deduction_container" id="deduction_list">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" id="addDeduction" class="form-control btn  btn-sm btn-success">
                                        <svg class="bi bi-plus-square" width="1em" height="1em" viewBox="0 0 16 16"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <h5 class="card-title">Other Deduction</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" name=""  placeholder="Deduction title">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="number" class="form-control" name="" placeholder="Deduction value">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <span class="input-group-text" id="">N</span>
                                </div>
                                <input type="text" class="form-control" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Total Allowance</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">N</span>
                                </div>
                                <input type="text" class="form-control" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Total Deduction</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">N</span>
                                </div>
                                <input type="text" class="form-control" readonly />
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
                                <input type="text" class="form-control" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> Payment method</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="" id="">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
    
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="" id="">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Comments</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="" id="" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>