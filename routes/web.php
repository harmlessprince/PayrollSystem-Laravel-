<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('employee', 'AdminController');

// Auth::routes();
Auth::routes(['register' => false]);
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/manage-employee', 'AdminController@manageEmployee');
Route::get('/create-employee', 'AdminController@create');
Route::get('/delete-employee/{id}', 'AdminController@destroyEmployee');
// Route::get('/employee/{{$user->id}}', 'AdminController@show');

Route::get('/employeeDetails', function(){
    return view('adminpages.employeeDetails');
});

Route::get('/fetch/desigantions/{id}', 'AdminController@getDesignations');
Route::get('/create-department', 'AdminController@createdepartment');
Route::get('/manage-department', 'AdminController@manageDepartment');

Route::get('/department/{id}/editDepartmentDesigantion', 'AdminController@editDepartmentDesigantion');

Route::put('/department/{id}', 'AdminController@DepartmentDesignationUpdate');

Route::post('/create-department/store', 'AdminController@saveDepartment');

Route::get('/attendance/daily','AdminController@indexAttendance');
Route::get('/attendance','AdminController@generateAttendance')->name('generateattendance');
Route::post('/store/attendance','AdminController@storeAttendance');
Route::get('/attendance/report','AdminController@attendanceReport');

//Generating Employee Payslip
// Route::get('/create/payslip','AdminController@createPayslip');
// Route::post('/store/payslip','AdminController@storePayslip');
Route::get('/fetch/users/{id}','AdminController@fetchEmployee');
Route::get('/fetch/employee-fiance/{id}','AdminController@fetchEmployeeFinance');
Route::get('/fetch/deductions','AdminController@fetchDeductions');
Route::get('/fetch/allowances','AdminController@fetchAllowances');





// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('allowances/get/{id}', 'AdminController@loadAllowances');

Route::get('/payroll/configuration', 'AdminController@appConfiguration');

Route::post('/store/allowance&deductions', 'AdminController@SaveAllowanceAndDeductions');



//////////////////////////////////---Generate PaySlips-----///////////////////////////////
Route::resource('payslips', 'PayslipController');
// Route::resource('photos', 'PhotoController')->except([
//     'create', 'store', 'update', 'destroy'
// ]);
Route::get('/load-payslips', 'PayslipController@load_payslips');
Route::get('/print/payslip/{id}', 'PayslipController@get_payslip_data');

//////////////////////////////////---Generate PaySlips-----///////////////////////////////

////////////////////////////////////---- Employee Routes-----/////////////////////
Route::get('/', 'EmployeeController@index');
Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::get('/view/payslips', 'EmployeeController@indexpayslip');
Route::get('/load-payslips', 'EmployeeController@load_payslips');
Route::get('/mypayslip/{id}', 'EmployeeController@show');
Route::get('/print/payslip/{id}', 'EmployeeController@get_payslip_data');
Route::get('/create/leave', 'EmployeeController@createleave');
Route::get('/show/leaves/{id}', 'EmployeeController@showleave');
Route::post('/store/leave/', 'EmployeeController@storeleave' );