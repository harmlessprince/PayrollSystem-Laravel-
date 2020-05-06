@extends('layouts.master')
@section('title','Create Deduction')
@section('page-name', 'Create Deduction')
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
<form action="/store/deduction" method="post">
@csrf
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 mx-auto ">
        @include('flash-message')
            <h5 class="card-title">Deductions</h5>
            <div class="card card-deduction">
                <div class="card-body">
                    <ul class="list-group deduction_container" id="deduction_list">
                        <li class="list-group-item">
                            <div class="row deduction_list_form">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control deduction_type" name="deduction_name[]"
                                            id="deduction_list">
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
<script src="/vendor/deduction.js"></script>
@endsection
