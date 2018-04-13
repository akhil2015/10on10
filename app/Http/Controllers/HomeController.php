<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function update_name(Request $request)
    {
      $name=Input::get('name');
      $s=Auth::user()->name;
      DB:table('users')
        ->where(['email',$s]);
        ->update(['name'=>$name]);
        return redirect();
    }
    public function update_email(Request $request)
    {
      $email=Input::get('email');
      $s=Auth::user()->name;
      DB:table('users')
        ->where(['email',$s]);
        ->update(['email'=>$email]);
        return redirect();
    }
    public function update_mobile(Request $request)
    {
      $mobile=Input::get('mobile');
      $s=Auth::user()->name;
      DB:table('users')
        ->where(['email',$s]);
        ->update(['mobile'=>$mobile]);
      return redirect();
    }

    public function update_institute(Request $request)
    {
      $institute=Input::get("institute");
      $s=Auth::user()->name;
      DB:table('users')
        ->where(['email',$s]);
        ->update(['institute'=>$institute]);
      return redirect();
    }

}
