<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Exam;

use Illuminate\Http\Request;

use Auth;

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
        $s=Auth::user()->email;
        $data['data']=DB::table('tests')->where('email',$s)->get();
        return view('teacher',$data);
    }
    public function publish($test_id)
    {
        $exam = new Exam;
        $exam->test_id=$test_id;
        $exam->code=str_random(8);
        $exam->duration=10;
        $exam->email=Auth::user()->email;
        $exam->save();
        $data['data']=$exam;
        return view('publish',$data);
    }
    public function result($code)
    {
        $data['data']=DB::table('responses')->where('code',$code)->get();
        return view('result',$data);
    }

    public function exams()
    {
        $s=Auth::user()->email;
        $data['data']=DB::table('exams')->where('email',$s)->get();
        return view('exams',$data);
    }

     public function update_name(Request $request)
    {
      $name=Input::get('name');
      $s=Auth::user()->email;
      DB::table('teachers')
        ->where([['email',$s]])
        ->update(['name'=>$name]);
        return redirect()->intended(route('teacher.dashboard'));
    }
    public function update_email(Request $request)
    {
      $email=Input::get('email');
      $s=Auth::user()->email;
      DB::table('teachers')
        ->where([['email',$s]])
        ->update(['email'=>$email]);
         return redirect()->intended(route('teacher.dashboard'));
    }
    public function update_mobile(Request $request)
    {
      $mobile=Input::get('mobile');
      $s=Auth::user()->email;
      DB::table('teachers')
        ->where([['email',$s]])
        ->update(['mobile'=>$mobile]);
      return redirect()->intended(route('teacher.dashboard'));
    }

    public function update_institute(Request $request)
    {
      $institute=Input::get("institute");
      $s=Auth::user()->email;
      DB::table('teachers')
        ->where([['email',$s]])
        ->update(['institute'=>$institute]);
       return redirect()->intended(route('teacher.dashboard'));
   }
}
