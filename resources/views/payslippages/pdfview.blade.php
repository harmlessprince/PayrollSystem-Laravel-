<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .list-group-item {
            padding: .1rem;
            border: 0;
        }

        .slip_logo {
            height: 5em;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-body ">
                    <div class="row text-center ">
                        <div class="col-md-4 mx-auto ">
                            <img src="/vendor/logo.png" alt="" srcset="" class="slip_logo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Employee ID:</strong> {{$payslip->user->id}} </li>
                                <li class="list-group-item"><strong>Department:
                                    </strong>{{$payslip->user->department->department_name}} </li>
                                <li class="list-group-item"><strong>Phone Number: </strong>
                                    {{$payslip->user->phone_number}}
                                </li>
                                <li class="list-group-item"><strong>Date</strong> {{ date('d-m-Y') }} </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Name:</strong> {{$payslip->user->employee_name}}
                                </li>
                                <li class="list-group-item"><strong>Designation:
                                    </strong>{{$payslip->user->designation->designation_name}} </li>
                                <li class="list-group-item"><strong>Account Number: </strong>
                                    {{$payslip->user->account->account_number}} </li>
                                <li class="list-group-item"><strong>Email: </strong> {{$payslip->user->email}} </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Payslip No:</strong><span class="text-uppercase">
                                        {{$payslip->id}}{{$payslip->slip_number}} </span></li>
                                <li class="list-group-item"><strong>Payslip Status: </strong>
                                    @if ($payslip->status == false )
                                    Unpaid
                                    @else
                                    Paid
                                    @endif
                                </li>
                                <li class="list-group-item"><strong>Method Of Payment: </strong>
                                    {{$payslip->methodOfPayment}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Earnings</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Basic Salary</td>
                                        <td>₦ {{$payslip->basic_salary}}</td>
                                    </tr>

                                    @foreach ($payslip->user->allowances as $allowance)
                                    <tr>

                                        <td>{{$allowance->pivot->allowance_name}}</td>
                                        <td>₦ {{$allowance->pivot->allowance_value}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Total Earnings</th>
                                        <th scope="col">₦
                                            @php
                                            $sum = 0;
                                            foreach ($payslip->user->allowances as $allowance){
                                            $sum = $sum + $allowance->pivot->allowance_value ;
                                            }
                                            $total_earnings = $sum + $payslip->basic_salary;
                                            echo $total_earnings;
                                            @endphp
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Deduction</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($payslip->user->deductions as $deduction)
                                    <tr>

                                        <td>{{$deduction->pivot->deduction_name}}</td>
                                        <td>₦ {{$deduction->pivot->deduction_value}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Total deductions</th>
                                        <th scope="col">₦
                                            @php
                                            $sum = 0;
                                            foreach ($payslip->user->deductions as $deduction){
                                            $sum = $sum + $deduction->pivot->deduction_value ?? '';
                                            }
                                            $total_deductions = $sum;
                                            echo $total_deductions;
                                            @endphp
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p> <strong>Net Pay:</strong> ₦
                                @php
                                echo $total_earnings - $total_deductions ?? '';
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>
</body>

</html>