@extends('layouts.master')
@section('title','Update Employee Details')
@section('page-name', 'Update Employee Details')
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
</style>
@endsection
@section('main-content')
{!! Form::open(['action'=>['AdminController@update', $user->id], 'method'=>'POST', 'enctype'=>'multipart/form-data' ])
!!}
@method('PUT')
<div class="row">
    <div class="col-md-12">
        @include('flash-message')
    </div>
    <input type="hidden" name="" id="user_id" value="{{$user->id}}">
    <!--Employee Details Section -->
    <div class="col-lg-6 ">
        <div class="card mb-4 p-3">
            <div class="card-header py-3" data-toggle="collapse" data-target="#employeeDetails" aria-expanded="false">
                <h6 class="m-0 font-weight-bold">Employee Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="employeeDetails">
                    <div class="form-group">
                        {{Form::label('employee_name','Employee Name')}}
                        {{Form::text('employee_name',$user->employee_name,['class'=>'form-control'])}}
                        @error('employee_name')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class=" form-group">
                        {{Form::label('date_of_birth','Date of Birth*')}}
                        {{Form::date('date_of_birth',$user->date_of_birth, ['class'=>'form-control'] )}}
                        @error('date_of_birth')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('gender','Gender')}}
                        {{Form::select('gender',['male' => 'Male', 'female' => 'Female'], $user->gender ,['class'=>'form-control','placeholder' => 'Gender'])}}
                        @error('gender')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('phone_number','Phone Number')}}
                        {{Form::tel('phone_number',$user->phone_number,['class'=>'form-control'])}}
                        @error('phone_number')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('nationality','Nationality')}}
                        {{Form::text('nationality',$user->nationality,['class'=>'form-control'])}}
                        @error('nationality')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('address','Local Address')}}
                        {{Form::textarea('address',$user->address,['class'=>'form-control', 'rows'=>'3'])}}
                        @error('address')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('marital_status','Marital Status')}}
                        {{Form::select('marital_status',['single' => 'Single', 'married' => 'Married'], $user->marital_status ,['class'=>'form-control','placeholder' => 'Pick a status..'])}}
                        @error('marital_status')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                </div>
            </div>
            <!--Account Login Details Section -->
            <div class="card-header py-3" data-toggle="collapse" data-target="#loginDetails">
                <h6 class="m-0 font-weight-bold">Account Login</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="loginDetails">
                    <div class="form-group">
                        {{Form::label('email','E-mail')}}
                        {{Form::email('email',$user->email,['class'=>'form-control'])}}
                        @error('email')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="col-lg-6">
        <div class="card mb-4 p-3">
            <!--Compnay Details Section -->
            <div class="card-header py-3" data-toggle="collapse" data-target="#companyDetails">
                <h6 class="m-0 font-weight-bold">Company Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="companyDetails">
                    <div class="form-group">
                        {{Form::label('id','Employee ID')}}
                        {{Form::text('id',$user->id,['class'=>'form-control','readonly'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('role','Employee Role')}}
                        {{Form::select('role',['employee' => 'Employee', 'admin' => 'Admin'], $user->role ,['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <select class="form-control departments mb-2" id="department_name"
                            data-dependent="employee_name" name="department_name">
                            <option disabled selected="true">-----Select----</option>
                            @foreach ($departments as $department)
                            @if ($department->id == $user->department_id)
                            <option value="{{$department->id}}" selected> {{$department->department_name}}
                            </option>
                            @else
                            <option value="{{$department->id}}"> {{$department->department_name}}
                            </option>
                            @endif

                            @endforeach
                        </select>
                        @error('department_id')
                        <p class=" text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">

                        <select name="designation_name" class="form-control" id="designations">
                            <option selected value="{{$user->designation_id}}">{{$user->designation->designation_name}}
                            </option>

                        </select>

                    </div>
                    <div class=" form-group">
                        {{Form::label('resumption_date','Resumption Date')}}
                        {{Form::date('resumption_date',$user->resumption_date, ['class'=>'form-control'] )}}
                        @error('resumption_date')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('employee_status','Employee Status')}}
                        {{Form::select('employee_status',['active' => 'Active', 'inactive' => 'Inactive'], $user->employee_status ,['class'=>'form-control'])}}
                    </div>
                </div>
            </div>


            <!--Finantial Details Section -->
            <div class="card-header py-3 mb-5" data-toggle="collapse" data-target="#financialDetails">
                <h6 class="m-0 font-weight-bold">Financial Details</h6>
            </div>
            <div class="collapse" id="financialDetails">
                <div class="allAllowances">
                    <h5 class="card-title">Allowances</h5>
                    @error('allowance_name')
                    <p class="text-danger"> {{$message}} </p>
                    @enderror
                    <div class="card-body">
                        <ul class="list-group allowance_container" id="allowance_list">
                            <li class="list-group-item">
                                <div class="row allowance_form">
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control" name="allowance_name[]" id="allowance_name">
                                                <option disabled selected="true"> -----Select----</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="number" class="form-control allowance" name="allowance_value[]"
                                                id="allowance_value">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" id="addAllowance"
                                            class="form-control btn  btn-sm btn-success">
                                            
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
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Total Allowance</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">N</span>
                                    </div>
                                    <input type="text" class="form-control total_allowance " id="total_allowance"
                                        name="total_allowance" readonly required="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
                <h5 class="card-title">Deductions</h5>
                <div class="card card-deductions">
                    <div class="card-body">
                        <ul class="list-group deduction_container" id="deduction_list">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control" name="deduction_name[]" id="deduction_name">
                                                <option disabled selected="true"> -----Select----</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="number" class="form-control deduction" name="deduction_value[]"
                                                id="deduction_value">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" id="addDeduction"
                                            class="form-control btn  btn-sm btn-success">
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
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Total Deduction</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">N</span>
                                </div>
                                <input type="text" id="total_deduction" name="total_deduction"
                                    class="form-control total_deduction" readonly required="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group basic_salary">
                        {{Form::label('basic_salary','Basic Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::number('basic_salary','',['class'=>'form-control', 'id'=>'basic_salary'])}}
                            @error('basic_salary')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        {{Form::label('total_salary','Total Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::text('total_salary','' ,['class'=>'form-control', 'id'=>'total_salary', 'readonly'])}}
                            <br>
                            @error('total_salary')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <!-- Bank Account Details--->
            <div class="card-header py-3" data-toggle="collapse" data-target="#bank_details">
                <h6 class="m-0 font-weight-bold">Bank Account Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="bank_details">
                    <div class="form-group">
                        {{Form::label('account_name','Account Name')}}
                        {{Form::text('account_name', $user->account->account_name,['class'=>'form-control'])}}
                        @error('account_name')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('account_number','Account Number')}}
                        {{Form::text('account_number', $user->account->account_number,['class'=>'form-control'] )}}
                        @error('account_number')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('bank_name','Bank Name')}}
                        {{Form::text('bank_name', $user->account->bank_name,['class'=>'form-control'])}}
                        @error('bank_name')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{Form::submit('Update Employee',['class'=>'btn btn-primary btn-lg btn-block mt-3'])}}
    </div>
</div>
{!! Form::close() !!}
@endsection
@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/userapps.js"></script>
<script src="/vendor/loadfianance.js"></script>

@endsection