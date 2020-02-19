@extends('layouts.master')
@section('title','Employee Details')
@section('page-name', 'Employee Details')

@section('main-content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab"
            aria-controls="personal" aria-selected="true">Personal Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="company"
            aria-selected="false">Company Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="financial-tab" data-toggle="tab" href="#financial" role="tab" aria-controls="financial"
            aria-selected="false">Financial Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="bankAccount-tab" data-toggle="tab" href="#bankAccount" role="tab"
            aria-controls="bankAccount" aria-selected="false">Bank Account Details</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
        <div class="row mt-2">
            <div class="col-lg-3">
                <img src="/storage/Employee_Images/{{$user->user_photo}}" alt="{{$user->employeeName}}"
                    class="img-thumbnail" style="height:180px; width:180px;">
            </div>
        </div>
        <div class="row mt-2 ">
            <div class="col-lg-12 border-top border-bottom p-2">
                <span class="float-left">Name</span>
                <span style="margin-left:50%"> {{$user->employeeName}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">E-mail</span>
                <span style="margin-left:50%"> {{$user->email}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Date of Birth</span>
                <span style="margin-left:50%"> {{$user->dateOfBirth}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2 ">
                <span class="float-left">Gender</span>
                <span style="margin-left:50%"> {{$user->gender}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Phone Number</span>
                <span style="margin-left:50%"> {{$user->phone_number}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Nationality</span>
                <span style="margin-left:50%"> {{$user->nationality}} </span>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
        <div class="row mt-2 ">
            <div class="col-lg-12 border-top border-bottom p-2">
                <span class="float-left">Employee ID</span>
                <span style="margin-left:50%"> {{$user->employeeName}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Department</span>
                <span style="margin-left:50%"> {{$user->email}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Designation</span>
                <span style="margin-left:50%"> {{$user->dateOfBirth}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2 ">
                <span class="float-left">Date of Joining</span>
                <span style="margin-left:50%"> {{$user->gender}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Date of Leaving</span>
                <span style="margin-left:50%"> {{$user->phone_number}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Status</span>
                <span style="margin-left:50%"> {{$user->nationality}} </span>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="financial" role="tabpanel" aria-labelledby="financial-tab">
        <div class="row mt-2 ">
            <div class="col-lg-12 border-top border-bottom p-2">
                <span class="float-left">Basic Salary</span>
                <span style="margin-left:50%"> {{$user->employeeName}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">HRA</span>
                <span style="margin-left:50%"> {{$user->email}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Monthly Tax Deduction</span>
                <span style="margin-left:50%"> {{$user->dateOfBirth}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2 ">
                <span class="float-left">Total</span>
                <span style="margin-left:50%"> {{$user->gender}} </span>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="bankAccount" role="tabpanel" aria-labelledby="bankAccount-tab">
        <div class="row mt-2 ">
            <div class="col-lg-12 border-top border-bottom p-2">
                <span class="float-left">Account Holder Name</span>
                <span style="margin-left:50%"> {{$user->employeeName}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Account Number</span>
                <span style="margin-left:50%"> {{$user->email}} </span>
            </div>
            <div class="col-lg-12 border-bottom p-2">
                <span class="float-left">Bank Name</span>
                <span style="margin-left:50%"> {{$user->dateOfBirth}} </span>
            </div>
        </div>
    </div>
</div>
@endsection