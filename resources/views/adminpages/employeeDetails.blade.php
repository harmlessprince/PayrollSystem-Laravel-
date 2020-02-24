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
    {{-- Personal Details --}}
    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
        <div class="row mt-2">
            <div class="col-lg-12 mb-3 mt-3">
                <img src="/storage/Employee_Images/{{$user->user_photo}}" alt="{{$user->employeeName}}"
                    class="img-thumbnail" style="height:180px; width:180px;">
            </div>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td > {{$user->employeeName}} </td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of Birth</th>
                            <td>{{$user->dateOfBirth}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>{{$user->gender}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>{{$user->phone_number}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nationality</th>
                            <td>{{$user->nationality}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
    {{-- Company details  --}}
    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
        <div class="row mt-2 ">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Employee ID</th>
                            <td > {{$user->id}} </td>
                        </tr>
                        <tr>
                            <th scope="row">Department</th>
                            <td>{{$user->department}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Designation</th>
                            <td>{{$user->designation}}</td>
                        </tr>   <br>
                        <tr>
                            <th scope="row">Date of Joining</th>
                            <td>......</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of Leaving</th>
                            <td>.....</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>{{$user->employeeStatus}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Financial Details section --}}
    <div class="tab-pane fade" id="financial" role="tabpanel" aria-labelledby="financial-tab">
        <div class="row mt-4 ">
            <div class="table-responsive">
                <table class="table border-top-0" >
                    <tbody>
                        <tr  >
                            <th scope="row">Basic Salary</th>
                            <td>{{$user->department}}</td>
                        </tr>
                        <tr>
                            <th scope="row">HRA</th>
                            <td>{{$user->designation}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Monthly Tax Deduction</th>
                            <td>......</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of Leaving</th>
                            <td>.....</td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td>{{$user->employeeStatus}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="bankAccount" role="tabpanel" aria-labelledby="bankAccount-tab">
        <div class="row mt-4 ">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Account Holder Name</th>
                            <td>{{$user->accountName}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Number</th>
                            <td>{{$user->accountNumber}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Bank Name</th>
                            <td>{{$user->bankName}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection