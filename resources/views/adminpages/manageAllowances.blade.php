@extends('layouts.master')
@section('title','Manage Allowances')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('page-name', 'Manage Allowances')

@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Allowances </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Allowance Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($allowances as $index => $allowance)

                    <tr>
                        <td>{{$index+1}}</td>
                        <td  class="text-capitalize">{{$allowance->allowance_name}}</td>
                        <td>
                            <a href="/allowance/edit/{{$allowance->id}}" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/datatables-demo.js"></script>
@endsection