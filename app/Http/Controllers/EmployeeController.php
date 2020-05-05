<?php

namespace App\Http\Controllers;

use App\Payslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function applyforleave()
    {
       return view ('employeepages.leave');
    }


    public function displayleaves()
    {
       return view ('employeepages.displayleaves');
    }
}
