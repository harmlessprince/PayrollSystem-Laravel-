<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Payslip;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboards.employee');
    }

    public function show($id){

        $user = User::with('account')->find($id);

        return view('employeepages.profile',  ['user' => $user]);
    }

    public function showslip($id){

        $payslip = Payslip::with([
            'user' => function ($query) {
                return $query->select('id', 'employee_name', 'department_id', 'designation_id', 'email', 'phone_number')
                    ->with('account', 'allowances.users', 'deductions.users');
            },
            'user.department' => function ($query) {
                return  $query->select('id', 'department_name');
            },
            'user.designation' => function ($query) {
                return $query->select('id', 'designation_name');
            },

        ])->find($id);
        return view('employeepages.show', ['payslip' => $payslip]);
    }




    public function indexpayslip(){
        return view('employeepages.indexpayslip');
    }


    public function load_payslips(Request $request)
    {
        $this->validate($request, [
            'payslip_year' => 'required|integer',
            'payslip_month' => 'required'
        ]);


        if (request()->ajax()) {
            if (!empty($request->payslip_year && $request->payslip_month)) {
                $data = Payslip::with('user')
                    ->select(
                        'id',
                        'user_id',
                        'basic_salary',
                        'payslip_year',
                        'payslip_month',
                        'status',
                        'basic_salary',
                        'total_salary',
                        'total_allowance',
                        'total_deduction'
                    )
                    ->where('payslip_year', array($request->payslip_year))
                    ->where('payslip_month', array($request->payslip_month))
                    ->where('user_id', Auth::id())
                    ->get();
            } else {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Payslip not found'
                    ]
                );
            }
            return  DataTables::of($data)->make(true);
        }
    }


    public function get_payslip_data($id)
    {

        $payslip = Payslip::with([
            'user' => function ($query) {
                return $query->select('id', 'employee_name', 'department_id', 'designation_id', 'email', 'phone_number')
                    ->with('account', 'allowances.users', 'deductions.users');
            },
            'user.department' => function ($query) {
                return  $query->select('id', 'department_name');
            },
            'user.designation' => function ($query) {
                return $query->select('id', 'designation_name');
            },

        ])->find($id);
        // return $payslip;



        return view('employeepages.pdfview', ['payslip'=>$payslip]);
        // $pdf = PDF::loadView('payslippages.pdfview', ['payslip'=>$payslip]);
        // return $pdf->download('invoice.pdf');
        // return $pdf->stream();
    }


    public function createleave()
    {
       return view ('employeepages.createleave');
    }


    public function showleave($id)
    {
        $leaves = Leave::with([
            'user' => function ($query) {
                return $query->select('id', 'employee_name');
            }])->where('user_id', $id)->get();
            
        // return json_encode($leave);
        // return view('employeepages.show', ['payslip' => $payslip]);
       return view ('employeepages.displayleaves',  ['leaves' => $leaves]);
    }

    public function storeleave(Request $request)
    {

        $this->validate($request, [
            'leave_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'description' => 'required',
            
        ]);
        
        $todaysDate = date('Y-m-d');

       

        $from_date = $request->input('from_date');
            
        $to_date = $request->input('to_date');

        // ("Todays date. $todaysDate);


        if ($todaysDate < $from_date ) {

            if ($to_date <= $from_date) {
                return redirect('/create/leave')->with('error', 'From Date: '.$from_date.' must be greater than To Date: '.$to_date.'. Please choose a date greater than From Date' );
            }else {
               
                Leave::create([
                    'user_id' => Auth::id(),
                    'leave_type' => $request->input('leave_type'),
                    'from_date' => $request->input('from_date'),
                    'to_date' => $request->input('to_date'),
                    'description' => $request->input('description'),
        
                ]);
                return redirect('/create/leave')->with('success', 'Leave form has been submitted');
            }
            
        }else {
             return redirect('/create/leave')->with('error', 'From Date: '.$from_date.' Can not be less than or equal to Today\'s Date: '.$todaysDate.'. Please choose a date greater than today\'s date' );
        }

        

        
     //  dd($request->all());
    }
}
