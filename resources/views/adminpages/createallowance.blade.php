@extends('layouts.master')
@section('title','Create allowance')
@section('page-name', 'Create allowance')
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
</style>
@endsection
@section('main-content')
<form action="/store/allowance" method="post">
@csrf
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 mx-auto ">
        @include('flash-message')
            <h5 class="card-title">Allowances</h5>
            <div class="card card-allowance">
                <div class="card-body">
                    <ul class="list-group allowance_container" id="allowance_list">
                        <li class="list-group-item">
                            <div class="row allowance_list_form">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control allowance_type" name="allowance_name[]"
                                            id="allowance_list">
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
                   
                </div>
                <div class=" mb-3  text-center ">
                    <button class="cancel_form btn btn-secondary"> Cancel </button>
                    <button type="button" class="reset_form btn btn-success"> Reset</button>
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </div>
    </div>


</div>
</form>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/allowance.js"></script>
@endsection


  
  
  {{-- allowance_deduction Details section --}}
  {{-- <div class="tab-pane fade" id="allowance_deduction" role="tabpanel" aria-labelledby="allowance_deduction-tab">
    <div class="container mt-5">
        <form action="/store/allowance&deductions" method="POST">
            <div class="row mt-4 ">
                @csrf
                <div class="col-lg-1">

                </div>
                <div class="col-lg-4 text-center">
                    <h5>Allowances</h5>

                    <ul class="list-group">
                        <li class="list-group-item border-0" id="allowance_list">
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    <input type="text" class="form-control reset" id = "allowance_name[]"  name="allowance_name[]" placeholder="Enter Allowance">
                                    <div class="col-auto">
                                        <a class="btn btn-secondary text-white" id="allowance"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @error('allowance_name.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </ul>

                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-4 text-center">
                    <h5>Deductions</h5>
                    <ul class="list-group">
                        <li class="list-group-item border-0" id="deduction_list">
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    <input type="text" id = "deduction_name[]"  name = "deduction_name[]" class="form-control reset" placeholder="Enter Deduction">

                                    <div class="col-auto">
                                        <a class="btn btn-secondary text-white" id="deduction"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @error('deduction_name.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </ul>
                </div>
                <div class="col-lg-1">

                </div>


            </div>
            <div class=" col-lg-6 mx-auto  text-center ">
                <a href="#" class="cancel_form_allowance_deduction  text-white  btn btn-secondary"> Cancel </a>
                <button type="button" class="reset_form_lallowance_deduction btn btn-success"> Reset</button>
                <button type="submit" name="btn_save_allowance_deduction" id="btn_save_allowance_deduction"
                    class="btn btn-primary">
                    Submit </button>
            </div>
        </form>
    </div>
</div> --}}