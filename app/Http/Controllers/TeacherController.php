<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher');
    }
    public function update_name(Request $request)
    {
      $name=Input::get("name");
      DB:table('teachers')
        ->where();
        ->update(['name'=>$name]);
        return redirect();
    }
    public function update_email(Request $request)
    {
      $email=Input::get("email");
      DB:table('teachers')
        ->where();
        ->update(['email'=>$email]);
        return redirect();
    }
    public function update_mobile(Request $request)
    {
      $mobile=Input::get("mobile");
      DB:table('teachers')
        ->where();
        ->update(['mobile'=>$mobile]);
        return redirect();
    }

    public function update_institute(Request $request)
    {
      $institute=Input::get("institute");
      DB:table('teachers')
        ->where();
        ->update(['institute'=>$institute]);

    }
}
