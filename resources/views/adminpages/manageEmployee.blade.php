
@extends('layouts.app')
@section('title','Manage Employees')
@section("page-level-scripts-up")
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('page-name', 'Manage Employees')

@section('main-content')
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Employee ID</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Department</th>
                          <th>Designation</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Employee ID</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Department</th>
                          <th>Designation</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Tiger Nixon</td>
                          <td>system@system.com</td>
                          <td>Technical</td>
                          <td>Head</td>
                          <td><a href="#" class="btn btn-sm btn-success" role="button">Active</a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-info" role="button">View</a>
                            <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Tiger Nixon</td>
                          <td>system@system.com</td>
                          <td>Technical</td>
                          <td>Head</td>
                          <td><a href="#" class="btn btn-sm btn-success" role="button">Active</a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-info" role="button">View</a>
                            <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Tiger Nixon</td>
                          <td>system@system.com</td>
                          <td>Technical</td>
                          <td>Head</td>
                          <td><a href="#" class="btn btn-sm btn-success" role="button">Active</a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-info" role="button">View</a>
                            <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Tiger Nixon</td>
                          <td>system@system.com</td>
                          <td>Technical</td>
                          <td>Head</td>
                          <td><a href="#" class="btn btn-sm btn-success" role="button">Active</a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-info" role="button">View</a>
                            <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Tiger Nixon</td>
                          <td>system@system.com</td>
                          <td>Technical</td>
                          <td>Head</td>
                          <td><a href="#" class="btn btn-sm btn-success" role="button">Active</a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-info" role="button">View</a>
                            <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Tiger Nixon</td>
                          <td>system@system.com</td>
                          <td>Technical</td>
                          <td>Head</td>
                          <td><a href="#" class="btn btn-sm btn-success" role="button">Active</a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-info" role="button">View</a>
                            <a href="#" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" role="button">Delete</a>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection

@section('page-level-scripts-down')
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
@endsection