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


                        {{Form::label('department_id','Department')}}
                        {{Form::select('department_name',$departments, $user->department_id ,['class'=>'form-control','placeholder' => 'Select employee department..'])}}

                        @error('department_id')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="form-group">

                        <select name="designation_name" class="form-control">
                            <option>Choose a department first.....</option>

                        </select>

                    </div>
                    <div class=" form-group">
                        {{Form::label('resumption_date','Resumption Date')}}
                        {{Form::date('resumption_date','', ['class'=>'form-control'] )}}
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
            <div class="card-header py-3" data-toggle="collapse" data-target="#financialDetails">
                <h6 class="m-0 font-weight-bold">Financial Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="financialDetails">

                    <div class="form-group basic_salary">
                        {{Form::label('basic_salary','Basic Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::number('basic_salary',$user->account->basic_salary ,['class'=>'form-control', 'id'=>'basic_salary'])}}
                            @error('basic_salary')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <ul class="list-group " id="sum_deduction">

                        <li class="list-group-item border-0" id="user_deduction_list">
                            @foreach ($user->deductions as $userdeduction)
                                <div class="form-group" id="deduction-form">
                            
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="alllowance">Deduction Name</label>

                                            <select class="form-control" name="deduction_name[]">

                                                    <option value="">Select a deduction type</option>

                                                    @foreach ($deductions as $deduction)
                                                    @if ($deduction->deduction_name == $userdeduction->pivot->deduction_name)
                                                    <option value="{{$deduction->deduction_name}}" selected> {{$deduction->deduction_name}}</option>
                                                    @else
                                                    <option value="{{$deduction->deduction_name}}" > {{$deduction->deduction_name}} </option>
                                                    @endif
                                                
                                                    @endforeach
                                                

                                            </select>

                                        </div>
                                        <div class="col">
                                            <label for="deduction_unit">Deduction Value(Naira)</label>
                                            <div class="input-group">
                                                <input type="number" name="deduction_value[]" id="deduction-0"
                                            class="form-control deduction" value="{{$userdeduction->pivot->deduction_value}}">
                                                <a type="button"
                                                    class="btn btn-sm btn-danger text-white text-center ml-1 btn_remove_deduction"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                        @error('deduction_value.*')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                           
                           
                        </li>
                        <input type="hidden" class="form-control total_deduction mt-1 mb-1" name="total_deduction"
                            id="total_deduction" placeholder="Total Deduction" readonly>
                        <button type="button" class="btn btn-warning btn-sm btn-block mt-2"
                            id="insert_new_deduction">Insert new Deduction</button>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item border-0" id="user_allowance_list">
                            @foreach ($user->allowances as $userallowance)
                                <div class="form-group" id="allowance-form">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="alllowance">Allowance Name</label>
                                            <select class="form-control" name="allowance_name[]" id="userAllowances">
                                                <option value="">Select an allowance type</option>

                                                @foreach ($allowances as $allowance)
                                                @if ($allowance->allowance_name == $userallowance->pivot->allowance_name)
                                                    <option value="{{$allowance->allowance_name}}" selected> {{$allowance->allowance_name}}</option>
                                                @else
                                                    <option value="{{$allowance->allowance_name}}" > {{$allowance->allowance_name}} </option>
                                                @endif
                                            
                                                @endforeach
                                            
                                            </select>

                                        </div>
                                        <div class="col">
                                            <label for="allowance_unit">Allowance Value(Naira)</label>
                                            <div class="input-group">
                                                <input type="number" name="allowance_value[]" id="allowance-0"
                                                    class="form-control allowance" value="{{$userallowance->pivot->allowance_value}}">
                                                <a type="button"
                                                    class="btn btn-sm btn-danger text-white text-center ml-1 btn_remove_allowance"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                @error('allowance_value[]')
                                                <p class="text-danger"> {{$message}} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </li>
                        @error('allowance_name.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <input type="text" class="form-control total_allowance mt-1 mb-1" name="total_allowance"
                            id="total_allowance" placeholder="Total Allowance" readonly>
                        <button type="button" class="btn btn-warning btn-sm btn-block " id="insert_new_allowance">Insert
                            new Allowance</button>
                    </ul>
                    <div class="form-group">
                        {{Form::label('total_salary','Total Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::text('total_salary','',['class'=>'form-control', 'id'=>'total_salary', 'readonly'])}}
                            <br>
                            @error('total_salary')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror
                            {{Form::button('Calculate Salary',['class'=>'btn btn-primary btn-sm btn-block mt-3','id'=>'calcTotalSalary'])}}
                            {{-- {{Form::button('sum_values','' ,['class'=>'form-control', 'id'=>'calcTotalSalary'], )}}
                            --}}

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
@endsection