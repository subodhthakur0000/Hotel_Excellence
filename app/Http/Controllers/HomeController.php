<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function viewadmin(){
        $data = DB::table('users')->get();
        return view('cd-admin.adminuser.viewadmin',compact('data'));
    }

    public function addadmin(){
        return view('cd-admin.adminuser.add-admin');
    }

    public function storeadmin(){
        $a=[];
        $data = Request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'      => ['required'],
        ]);
        $data['password'] = bcrypt($data['password']);
        DB::table('users')->insert($data);
        Session::flash('success');
        return redirect('/viewadmin');
    }

    public function deleteadmin($id){
         $test = DB::table('users')->where('id',$id)->get()->first();
         DB::table('users')->where('id',$id)->delete();
         Session::flash('deletesuccess');
         return redirect('/viewadmin');
    }
}
