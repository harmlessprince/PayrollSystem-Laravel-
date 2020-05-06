@extends('layouts.master')
@section('title','Employee Details')
@section('page-name', 'Employee Details')

@section('main-content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="company_detail-tab" data-toggle="tab" href="#company_detail" role="tab"
            aria-controls="company_detail" aria-selected="true">Company Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="logo_detail-tab" data-toggle="tab" href="#logo_detail" role="tab"
            aria-controls="logo_detail" aria-selected="false">Logo & Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="allowance_deduction-tab" data-toggle="tab" href="#allowance_deduction" role="tab"
            aria-controls="allowance_deduction" aria-selected="false">Allowance & Deductions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment"
            aria-selected="false">Payment</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    {{-- company_detail Details --}}
    <div class="tab-pane fade show active" id="company_detail" role="tabpanel" aria-labelledby="company_detail-tab">
        <div class="row mt-2">

            <div class="col-lg-6 mx-auto">

                <div class="container mt-5">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control"
                                placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control"
                                placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="company_email" id="company_email" class="form-control"
                                placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Website URL</label>
                            <input type="url" name="company_url" id="company_url" class="form-control" placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Company Address</label>
                            <textarea name="company_address" id="company_address" class="form-control" placeholder="">
                            </textarea>
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" name="company_city" id="company_city" class="form-control"
                                placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" name="company_state" id="company_state" class="form-control"
                                placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Post Code</label>
                            <input type="number" name="post_code" id="post_code" class="form-control" placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Company Country</label>
                            <input type="text" name="company_country" id="company_country" class="form-control"
                                placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="  text-center ">
                            <a href="#" class="cancel_form btn text-white btn-secondary"> Cancel </a>
                            <button type="reset" class="reset_form btn btn-success"> Reset</button>
                            <button type="submit" name="btn_save_company_details" id="btn_save_company_details"
                                class="btn btn-primary"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <br>
    </div>
    {{-- logo_detail details  --}}
    <div class="tab-pane fade" id="logo_detail" role="tabpanel" aria-labelledby="logo_detail-tab">
        <div class="row mt-2 ">
            <div class="col-lg-6 mx-auto">

                <div class="container mt-5">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="">Site Logo</label>
                            <input type="file" name="site_logo" id="site_logo" class="form-control" placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Site Title</label>
                            <input type="number" name="site_title" id="site_title" class="form-control" placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Site Footer</label>
                            <input type="email" name="site_footer" id="site_footer" class="form-control" placeholder="">
                            <small class="text-muted"></small>
                        </div>
                        <div class="  text-center ">
                            <a href="#" class="cancel_form_logo_detail btn text-white btn-secondary"> Cancel </a>
                            <button type="reset" class="reset_form_logo_detail  btn btn-success"> Reset</button>
                            <button type="submit" name="btn_save_logo_detail" id="btn_save_logo_detail"
                                class="btn btn-primary"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
        <div class="row mt-4 ">

            <div class="col-lg-5 mx-auto">
                <div class="container mt-5">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for=""></label>
                            <select class="form-control" name="" id="">
                                <option value="dollar">US Dollars</option>
                                <option value="naira">Naira</option>
                                <option value="euro">Euro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="  text-center ">
                            <a href="#" class="cancel_form_allowa  text-white  btn btn-secondary"> Cancel </a>
                            <button type="reset" class="reset_form_logo_detail btn btn-success"> Reset</button>
                            <button type="submit" name="btn_save_logo_detail" id="btn_save_logo_detail"
                                class="btn btn-primary">
                                Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/configurationpage.js"></script>
@endsection