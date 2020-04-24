<?php

namespace App\Http\Controllers;


// use App\Account;
use App\Account;
use App\Allowance;
use App\AllowanceUser;
use App\Attendance;
use App\Deduction;
use App\DeductionUser;
use App\Department;
use App\Designation;
use App\Fianancialdetail;
use App\User;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Yajra\DataTables\Contracts\DataTable;

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

    //This display's summary of employee data and gives access to edit, delete and view
    public function manageEmployee()
    {
        $users = User::with(['account'])->get();

        return view('adminpages.manageEmployee', ['users' => $users]);
        // $users = User::all();
        // return view('adminpages.manageEmployee')->with('users', $users);
    }

    public function create()
    {
        $departments = Department::pluck('department_name', 'id')->toArray();
        // $departments = Department::all();
        // $deductions = Deduction::pluck('deduction_name', 'id');
        $deductions = Deduction::all();
        $allowances = Allowance::all();


        return view('adminpages.createEmployee')->with(['departments' => $departments, 'deductions' => $deductions,  'allowances' => $allowances]);
    }

    //This funtion stores the users data in the database
    public function store(Request $request)
    {

        $this->validate($request, [
            'employee_name' => 'required',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',   //:rfc,dns
            'gender' => 'required',
            'phone_number' => 'required',
            'nationality' => 'required',
            'address' => 'required',
            'marital_status' => 'required',
            'department_name' => 'required',
            'designation_name' => 'required',
            'resumption_date' => 'required|date',
            'basic_salary' => 'required|numeric',
            'total_salary' => 'required|numeric',
            'allowance_name' => 'required',
            'allowance_value' => 'required',
            'deduction_name' => 'required',
            'deduction_value' => 'required',
            'account_name' => 'required|string',
            'account_number' => 'required|numeric',
            'bank_name' => 'required|string',
            'password' => 'required|confirmed',
            'user_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);

        //Creating User model Instance 
        $user = new User();


        // accepting User model datas
        $user->employee_name = $request->input('employee_name');
        $user->email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $user->password = $password;
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender = $request->input('gender');
        $user->phone_number = $request->input('phone_number');
        $user->nationality = $request->input('nationality');
        $user->address = $request->input('address');
        $user->marital_status = $request->input('marital_status');
        $user->department_id = $request->input('department_name');
        $user->designation_id = $request->input('designation_name');
        $user->resumption_date = $request->input('resumption_date');
        $user->employee_status = $request->input('employee_status');


        //Checking if file upload is present 

        if ($request->hasFile('user_photo')) {
            // Get file name with extension
            $fileNameWithExtension = $request->file('user_photo')->getClientOriginalName();

            //Get file name only
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            //Get file extension
            $fileExtension = $request->file('user_photo')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;

            //Upload image

            $imagePath = $request->file('user_photo')->storeAs('public/Employee_Images', $fileNameToStore);
        }


        //Saving User model Instance 

        $user->save();





        // Getting Deductions data

        $deductionnames = $request->input('deduction_name'); // Accept all dedutions names 


        $user_deduction_data = [];   //Initiallize array for deductions 

        for ($i = 0; $i < count($request->input('deduction_name')); $i++) { //Count number of input with deduction name array 

            // Get all the ids of sellected 
            $deductionsIds = array();
            foreach ($deductionnames as $deductionname) {

                $deductionsIds[] = Deduction::select('id')->where('deduction_name', $deductionname)->first()->id;
            }

            $user_deduction_data[$request->input('deduction_name')[$i]] = [
                'deduction_value' => $request->input('deduction_value')[$i],
                'deduction_name' => $request->input('deduction_name')[$i], 'deduction_id' => $deductionsIds[$i], 'user_id' => $user->id
            ];
        }

        $user->deductions()->attach($user_deduction_data);



        $allowancenames = $request->input('allowance_name');

        $sync_allowance_data = [];

        for ($i = 0; $i < count($request->input('allowance_name')); $i++) {

            $allowanceIds = array();
            foreach ($allowancenames as $allowancename) {

                $allowanceIds[] = Allowance::select('id')->where('allowance_name', $allowancename)->first()->id;
            }

            $sync_allowance_data[$request->input('allowance_name')[$i]] = [
                'allowance_value' => $request->input('allowance_value')[$i],
                'allowance_name' => $request->input('allowance_name')[$i], 'allowance_id' => $allowanceIds[$i], 'user_id' => $user->id
            ];
        }

        $user->allowances()->attach($sync_allowance_data);


        //Add total deduction value and allowance to database

        $account = new Account();
        $account->user_id = $user->id;
        $account->basic_salary = $request->input('basic_salary');
        $account->total_salary = $request->input('total_salary');
        $account->account_name = $request->input('account_name');
        $account->account_number = $request->input('account_number');
        $account->bank_name = $request->input('bank_name');


        // dd($user, $account, $sync_allowance_data, $user_deduction_data);
        $account->save();


        return redirect('/admin')->with('success', 'Employee Data Created Sucessfully');
    }


    public function show($id)
    {
        $user = User::with('account')->find($id);

        return view('adminpages.employeeDetails',  ['user' => $user]);
    }

    public function edit($id)
    {
        $departments = Department::pluck('department_name', 'id')->toArray();
        // $departments = Department::all();
        // $deductions = Deduction::pluck('deduction_name', 'id');
        $deductions = Deduction::all();
        $allowances = Allowance::all();

        $user = User::with('account', 'department', 'designation', 'allowances.users', 'deductions.users')->find($id);
        // ,'allowances.users', 'deductions.users'


        return view('adminpages.editEmployeeProfile')->with(['user' => $user, 'departments' => $departments, 'deductions' => $deductions,  'allowances' => $allowances]);
    }

    public function update()
    {
    }


    // creating department And Designation

    public function createDepartment()
    {
        return view('adminpages.createdepartment');
    }

    public function getDesignations($id)
    {
        $designations = DB::table("designations")->where("department_id", $id)->pluck("designation_name", "id")->toArray();

        return json_encode($designations);
    }

    //This funtion stores the department and Designations in the data in the database

    public function saveDepartment(Request $request)
    {

        $this->validate($request, [
            'designation_name.*' => 'required',
            'department_name' => 'required',
        ]);

        $department = new Department();


        $department->department_name = $request->input('department_name');
        $department->save();


        $designations = $request->designation_name;

        foreach ($designations as $designation_value) {
            $designations[] = Designation::create([
                'designation_name' => $designation_value,
                'department_id' => $department->id,
            ]);
        }

        return redirect('/admin')->with('success', 'Department Data uploaded sucessfully');
    }


    //Display's All Departments and Related Designations
    public function manageDepartment()
    {

        $departments = Department::with('designations')->get();

        $departments->loadCount('users');


        // $numberOfEmployessInDepts = Department::withCount('users')->get();

        return view("adminpages.manageDepartment", ['departments' => $departments]);
    }

    //Edit Department and Designation Method
    public function editDepartmentDesigantion($id)
    {
        $department = Department::with('designations')->find($id);

        return view('adminpages.editDepartmentDesigantion')->with(['department' => $department]);
    }

    public function DepartmentDesignationUpdate($id)
    {
    }


    //Methods Handling Attendance Of Employees

    public function indexAttendance()
    {
   
        $departments = Department::all();
        return view("adminpages.dailyAttendance")->with(["departments" => $departments]);
    }

    public function generateAttendance(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->attendance_department)) {
                $data = User::with('department')
                ->select('id', 'employee_name', 'department_id')
                ->where('department_id', array( $request->attendance_department))
                ->get();
            }else {
                $data = User::with('department')
                ->select('id', 'employee_name', 'department_id')
                ->get();
            }
            return  Datatables::of($data)->make(true);

        } 
    }


    public function storeAttendance(Request $request)
    {
        // $this->validate($request, [
        //     'employee_name' => 'required',
        //     'date_of_birth' => 'required|date',
            
        //     'allowance_value' => 'required',
        //     'deduction_name' => 'required',
        //     'deduction_value' => 'required',
            
        // ]);

        $attendnace = new Attendance();

         // accepting User model datas
        //  $attendnace->attendance_status = $request->input('attendance_status')->has('delete') ? 1 : 0;
        $attendnace->attendance_status = $request->input('attendance_status');
        $attendnace->user_id = $request->id;

       dd($attendnace);
    }
    public function attendanceReport()
    {
        return view("adminpages.attendanceReport");
    }

    //Compnay Settings Methods Starts Here

    public function appConfiguration()
    {
        return  view('adminpages.appsettings.configuration');
    }



    public function SaveAllowanceAndDeductions(Request $request)
    {


        $this->validate($request, [
            'allowance_name.*' => 'required',
            'deduction_name.*' => 'required'
        ]);

        $allowances = $request->allowance_name;

        foreach ($allowances as $allowance_value) {
            $allowances[] = Allowance::create([
                'allowance_name' => $allowance_value
            ]);
        }

        $deductions = $request->deduction_name;

        foreach ($deductions as $deduction_value) {
            $deductions[] = Deduction::create([
                'deduction_name' => $deduction_value
            ]);
        }

        return redirect('/admin')->with('success', 'Allowance(s) and Deduction(s) uploaded sucessfully');
    }

    public function loadAllowances($id)
    {
        $allowances = DB::table("allowances")->pluck("designation_name", "id")->toArray();

        return json_encode($allowances);
    }

    //Compnay Settings Methods Ends Here
}
