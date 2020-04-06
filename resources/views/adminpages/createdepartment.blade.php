@extends('layouts.master')
@section('title','Create Department')
@section('page-name', 'Create Department')

@section('main-content')
{!! Form::open(['action'=>'AdminController@saveDepartment', 'method'=>'POST', 'class'=>'myform']) !!}
@csrf
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 mx-auto ">
        <div class="card mb-4 p-3">
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department_name" id="department_name" class="form-control"
                    placeholder="Enter Department Name">
                @error('department_name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            {{-- {{ Form::text("first_name[$index]", $value = $employee_details->first_name,  $attributes = array()) }} --}}

            <ul class="list-group">
                <li class="list-group-item border-0" id="desigantion_list">
                    

                </li>
                @error('designation_name.*')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </ul>
            <button type="button" id="add_new_input" class="btn btn-sm btn-warning float-right mt-2"><i class="fas fa-plus"></i> Add
                Designation</button>
        </div>
        <div class="  text-center ">
            <button class="cancel_form btn btn-secondary"> Cancel </button>
            <button type="button" class="reset_form btn btn-success"> Reset</button>
            <button type="submit" name="btn_save_designation" id = "btn_save_designation" class="btn btn-primary"> Submit </button>
        </div>
    </div>


</div>
{!! Form::close() !!}
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="vendor/userapps.js"></script>
@endsection

