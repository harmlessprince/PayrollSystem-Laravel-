<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        return view('adminpages.manageEmployee');
    }

    public function create(){
        return view('adminpages.createEmployee');
    }

    public function store(Request $request){

        $this->validate($request, [
            // 'employeeName'=>'required',
            
            'user_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999|required'
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
            
          return $imagePath;
        //   $user = new User();
          
          // accepting album details
        //   $user->name = $request->input('name');
        //   $user->description = $request->input('description');
        //   $user->cover_image = $fileNameToStore;
            
        //   $user->save();
      
        //   return redirect('/')->with('success', 'Album uploaded sucessfully');
    }
}
