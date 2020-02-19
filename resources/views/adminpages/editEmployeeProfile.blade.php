@extends('layouts.master')
@section('title','Update Employee Details')
@section('page-name', 'Update Employee Details')

@section('main-content')
{!! Form::open(['action'=>['AdminController@update', $user->id], 'method'=>'POST', 'enctype'=>'multipart/form-data' ])
!!}
@method('PUT')
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 ">
        <div class="card mb-4 p-3">
            <div class="card-header py-3" data-toggle="collapse" data-target="#employeeDetails" aria-expanded="false">
                <h6 class="m-0 font-weight-bold">Employee Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="employeeDetails">
                    <div class="form-group">
                        {{Form::label('employeeName','Employee Name')}}
                        {{Form::text('employeeName',$user->employeeName,['class'=>'form-control'] )}}
                        @error('employeeName')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class=" form-group">
                        {{Form::label('dateOfBirth','Date of Birth*')}}
                        {{Form::date('dateOfBirth',$user->dateOfBirth, ['class'=>'form-control'] )}}
                        @error('dateOfBirth')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('gender','Gender')}}
                        {{Form::select('gender',['male' => 'Male', 'female' => 'Female'], $user->gender,['class'=>'form-control','placeholder' => 'Gender'])}}
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
                        {{Form::label('maritalStatus','Marital Status')}}
                        {{Form::select('maritalStatus',['single' => 'Single', 'married' => 'Married'], $user->maritalStatus ,['class'=>'form-control','placeholder' => 'Pick a status..'])}}
                        @error('maritalStatus')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('user_photo','Employee Photo')}}
                        {{Form::file('user_photo'), ['class'=>'form-control']}}
                        @error('user_photo')
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
                    <div class="form-group">
                        {{Form::label('password','Password')}}
                        {{Form::password('password',['class'=>'form-control'] )}}
                        @error('password')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('password_confirmation','Confirm Password')}}
                        {{Form::password('password_confirmation',['class'=>'form-control'])}}
                        @error('password_confirmation')
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
                        {{Form::label('department','Department')}}
                        {{Form::select('department',['technical' => 'Technical', 'marketting' => 'Marketting','sales' => 'Sales', 'HR' => 'Human Resource'], $user->department ,['class'=>'form-control','placeholder' => 'Select employee department..'])}}
                        @error('department')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('designation','Designation')}}
                        {{Form::select('designation',['technical' => 'Technical', 'marketting' => 'Marketting','sales' => 'Sales', 'HR' => 'Human Resource'], $user->designation ,['class'=>'form-control','placeholder' => 'Select employee department first..'])}}
                        @error('designation')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class=" form-group">
                        {{Form::label('resumptionDate','Resumption Date')}}
                        {{Form::date('resumptionDate',$user->resumptionDate, ['class'=>'form-control'] )}}
                        @error('resumptionDate')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('employeeStatus','Employee Status')}}
                        {{Form::select('employeeStatus',['active' => 'Active', 'inactive' => 'Inactive'], $user->employeeStatus ,['class'=>'form-control'])}}
                    </div>
                </div>
            </div>

            <!--Finantial Details Section -->
            <div class="card-header py-3" data-toggle="collapse" data-target="#financialDetails">
                <h6 class="m-0 font-weight-bold">Financial Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="financialDetails">

                    <div class="form-group">
                        {{Form::label('basicSalary','Basic Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::number('basicSalary','1000' ,['class'=>'form-control'])}}
                            @error('basicSalary')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-auto">
                                {{Form::select('deductionType',['tax' => 'Monthly Tax Deduction','pension' => 'Monthly Pension Deduction'], null ,['class'=>'form-control','placeholder'=>'Choose type of deduction'])}}
                                @error('deductionType')
                                <p class="text-danger"> {{$message}} </p>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    {{Form::number('deductionUnit','200',['class'=>'form-control'])}}
                                    @error('deductionUnit')
                                    <p class="text-danger"> {{$message}} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-secondary"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('totalSalary','Total Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::number('totalSalary','' ,['class'=>'form-control'])}}
                            @error('totalSalary')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bank Account Details--->
            <div class="card-header py-3" data-toggle="collapse" data-target="#bankDetails">
                <h6 class="m-0 font-weight-bold">Bank Account Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="bankDetails">
                    <div class="form-group">
                        {{Form::label('accountName','Account Name')}}
                        {{Form::text('accountName','',['class'=>'form-control'])}}
                        @error('accountName')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('accountNumber','Account Number')}}
                        {{Form::text('accountNumber','',['class'=>'form-control'] )}}
                        @error('accountNumber')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{Form::label('bankName','Bank Name')}}
                        {{Form::text('bankName','',['class'=>'form-control'])}}
                        @error('bankName')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{Form::submit('Register Employee',['class'=>'btn btn-primary btn-lg btn-block mt-3'])}}
    </div>
</div>
{!! Form::close() !!}
@endsection