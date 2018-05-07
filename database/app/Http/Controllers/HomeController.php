<?php

namespace App\Http\Controllers;

use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
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
    public function result_val(Request $request)
    {
      return redirect(route('user.result',Input::get('code2')));
    }
    public function exam(Request $request)
    {
      return redirect(route('user.exam',Input::get('code')));
    }

    public function viewexam($code)
    {
      //calculate time difference
      
      $exam_date= DB::table('exams')->where('code',$code)->value('created_at');
      $diff = Carbon::now()->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s', $exam_date));
      $diff= (int)$diff;
      
      //if 'buffer' seconds haven't passed then display the instructions
      $buffer = 3*24*60*60-22*60*60;
      if($diff < $buffer)
      {
        $data['data']=$buffer-$diff;
        return view('instru',$data);
      }
      else
      {
        $test_id=DB::table('exams')->where('code',$code)->value('test_id');
        $data['data']=DB::table('questions')->where('test_id',$test_id)->get();
        return view('stud_exam',$data);
      }
    }
    public function result($code)
    {
      $s=Auth::user()->email;
      $data['data']=DB::table('responses')->where([['code',$code],['email',$s]])->get();
      return view('stud_result',$data);
    }
    public function response(Request $request,$code)
    {
      $s=Auth::user()->email;
      $attempted=10;
      $correct=0;
      $incorrect=0;
      $response = new Response;
      $response->code=$code;
      $response->email=$s;
      $response->res1=Input::get('1');
      $response->res2=Input::get('2');
      $response->res3=Input::get('3');
      $response->res4=Input::get('4');
      $response->res5=Input::get('5');
      $response->res6=Input::get('6');
      $response->res7=Input::get('7');
      $response->res8=Input::get('8');
      $response->res9=Input::get('9');
      $response->res10=Input::get('10');

      $test_id = DB::table('exams')->where('code',$code)->value('test_id');
      $questions = DB::table('questions')->where('test_id',$test_id)->pluck('correct');


//compare and calculate marks for each subject;

      if($response->res1!=null)
      {
        //check if correct or not
        if($response->res1==$questions[0])
        {
          $correct+=1;
          $response->mark1=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark1=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark1=0;
      }

      if($response->res2!=null)
      {
        //check if correct or not
        if($response->res2==$questions[1])
        {
          $correct+=1;
          $response->mark2=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark2=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark2=0;
      }


      if($response->res3!=null)
      {
        //check if correct or not
        if($response->res3==$questions[2])
        {
          $correct+=1;
          $response->mark3=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark3=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark3=0;
      }

      if($response->res4!=null)
      {
        //check if correct or not
        if($response->res4==$questions[3])
        {
          $correct+=1;
          $response->mark4=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark4=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark4=0;
      }
      if($response->res5!=null)
      {
        //check if correct or not
        if($response->res5==$questions[4])
        {
          $correct+=1;
          $response->mark5=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark5=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark5=0;
      }

      if($response->res6!=null)
      {
        //check if correct or not
        if($response->res6==$questions[5])
        {
          $response->mark6=1;
          $correct+=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark6=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark6=0;
      }

      if($response->res7!=null)
      {
        //check if correct or not
        if($response->res7==$questions[6])
        {
          $correct+=1;
          $response->mark7=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark7=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark7=0;
      }


      if($response->res8!=null)
      {
        //check if correct or not
        if($response->res8==$questions[7])
        {
          $correct+=1;
          $response->mark8=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark8=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark8=0;
      }

      if($response->res9!=null)
      {
        //check if correct or not
        if($response->res9==$questions[8])
        {
          $correct+=1;
          $response->mark9=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark9=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark9=0;
      }
      if($response->res10!=null)
      {
        //check if correct or not
        if($response->res10==$questions[9])
        {
          $correct+=1;
          $response->mark10=1;
        }
        else
        {
          $incorrect+=1;
          $response->mark10=0;
        }
      }
      else
      {
        $attempted -= 1;
        $response->mark10=0;
      }
      $response->attempted=$attempted;
      $response->correct=$correct;
      $response->incorrect=$incorrect;
      $response->save();
      $data['data']=DB::table('responses')->where([['code',$code],['email',$s]])->get();
      return view('stud_result',$data);
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
      $s=Auth::user()->email;
      DB::table('users')
        ->where([['email',$s]])
        ->update(['name'=>$name]);
        return redirect()->intended(route('user.dashboard'));
    }
    public function update_email(Request $request)
    {
      $email=Input::get('email');
      $s=Auth::user()->email;
      DB::table('users')
        ->where([['email',$s]])
        ->update(['email'=>$email]);
         return redirect()->intended(route('user.dashboard'));
    }
    public function update_mobile(Request $request)
    {
      $mobile=Input::get('mobile');
      $s=Auth::user()->email;
      DB::table('users')
        ->where([['email',$s]])
        ->update(['mobile'=>$mobile]);
      return redirect()->intended(route('user.dashboard'));
    }

    public function update_institute(Request $request)
    {
      $institute=Input::get("institute");
      $s=Auth::user()->email;
      DB::table('users')
        ->where([['email',$s]])
        ->update(['institute'=>$institute]);
       return redirect()->intended(route('user.dashboard'));
   }
}
