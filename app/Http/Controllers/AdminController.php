<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    public function index()
    {
        return view('dashboards.admin');
    }

    public function manageEmployee(){
        $users = User::get();
        return view('adminpages.manageEmployee')->with('users',$users);
    }

    public function create(){
        return view('adminpages.createEmployee');
    }

    public function store(Request $request){

        $this->validate($request, [
            // 'employeeName'=>'required',
            
            'user_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999|required|dimensions:min_width=250,min_height=500'
          ]);
      
          // Get file name with extension
          $fileNameWithExtension = $request->file('user_photo')->getClientOriginalName();
      
          //Get file name only
          $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
      
          //Get file extension
          $fileExtension = $request->file('user_photo')->getClientOriginalExtension();
      
          $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;
      
          //Upload image
      
          $imagePath = $request->file('user_photo')->storeAs('public/Employee_Images', $fileNameToStore);
            
        //   return $imagePath;
          $user = new User();
          
          // accepting album details
          $user->employeeName = $request->input('employeeName');
          $user->employee_id = $request->id;
          $user->email = $request->input('email');
          $password = Hash::make($request->input('password'));
          $user->password = $password;
          $user->dateOfBirth = $request->input('dateOfBirth');
          $user->gender = $request->input('gender');
          $user->phone_number = $request->input('phone_number');
          $user->nationality = $request->input('nationality');
          $user->address = $request->input('address');
          $user->maritalStatus = $request->input('maritalStatus');
          $user->department = $request->input('department');
          $user->designation = $request->input('designation');
          $user->resumptionDate = $request->input('resumptionDate');
          $user->employeeStatus = $request->input('employeeStatus');
          $user->basicSalary = $request->input('basicSalary');
          $user->deductionType = $request->input('deductionType');
          $user->deductionUnit = $request->input('deductionUnit');
        //   $user->pensionUnit = $request->input('pensionUnit');
          $user->totalSalary = $request->input('totalSalary');
          $user->accountName = $request->input('accountName');
          $user->accountNumber = $request->input('accountNumber');
          $user->bankName = $request->input('bankName');
          $user->user_photo = $fileNameToStore;
          
          
          $user->save();
          return redirect('/admin')->with('success', 'Employee Data uploaded sucessfully');
    }

    public function show($id){

        return view('adminpages.show');
        // $user = User::find($id);
        // return view('adminpages.viewprofile')->with('user', $user);
    }
}
