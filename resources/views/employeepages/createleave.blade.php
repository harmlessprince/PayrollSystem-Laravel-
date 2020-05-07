@extends('layouts.master')
@section('title','Apply For Leave')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> --}}
@endsection

@section('page-name', 'Apply for Leave')

@section('main-content')

<!-- DataTales Example -->

<div class="card   shadow mb-4">
    {{-- /store/leave --}}
    <form action="/send/leave-request/" method="POST" id="leave">
        @csrf
        <div class="card">
            <div class="mx-auto col-md-8">
                @include('flash-message')
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col">
                            <label for="leave_type" class="col col-form-label"><strong>Leave Type</strong></label>
                            <select class="form-control" name="leave_type" id="leave_type">
                                
                                {{-- <option disabled selected>------select-----</option>
                                <option value="medical">Medical</option>
                                <option value="annual">Annual</option>
                                <option value="personal">Personal</option>
                                <option value="career">Career</option>
                                <option value="parental">Parental</option>
                                <option value="compassionate">Compassionate</option> --}}
                            </select>
                        </div>
                        <div class="col">
                            <label for="from" class="col col-form-label"><strong> Leave Status </strong></label>
                            <div>
                                <input class="form-control" type="text" name="status" id="status" readonly placeholder="Pending">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="from"><strong> From </strong>(Month-Day-Year)</label>
                            <div>
                                <input class="form-control" type="date" name="from_date" id="from_date"
                                    data-validation="required">
                            </div>
                        </div>
                        <div class="col">
                            <label for="to"><strong> To</strong> (Month-Day-Year) </label>
                            <div>
                                <div>
                                    <input class="form-control" type="date" name="to_date" id="to_date"
                                        data-validation="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong> Description </strong></label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            data-validation="required"></textarea>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col">
                            <a class="btn  btn-secondary" href="#">Cancle</a>
                            <a class="btn btn-warning" href="#">Reset</a>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/leave.js"></script>
<!-- Page level custom scripts -->
{{-- <script src="/js/demo/datatables-demo.js"></script> --}}

@endsection