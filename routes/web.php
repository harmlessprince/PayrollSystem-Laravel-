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

Route::get('/', 'EmployeeController@index');
Route::resource('employee', 'AdminController');
// Auth::routes();
Auth::routes(['register' => false]);
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/manage-employee', 'AdminController@manageEmployee');
Route::get('/create-employee', 'AdminController@create');
// Route::get('/employee/{{$user->id}}', 'AdminController@show');

Route::get('/employeeDetails', function(){
    return view('adminpages.employeeDetails');
});


Route::get('/employee', 'EmployeeController@index')->name('employee');
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
