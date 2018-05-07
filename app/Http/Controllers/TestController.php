<?php

namespace App\Http\Controllers;

use App\Test;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;



class TestController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:teacher');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($test_id)
    {
        $data['data']=DB::table('questions')->where('test_id',$test_id)->get();
        return view('test',$data);
    }
    public function question($test_id)
    {
        $data['data']=$test_id;
        return view('addques',$data);    
    }
    public function questionadd(Request $request,$data)
    {
        $question = new Question;
        $question->test_id=$data;
        $question->question=Input::get("question");
        $question->opt1=Input::get("option1");
        $question->opt2=Input::get("option2");
        $question->opt3=Input::get("option3");
        $question->opt4=Input::get("option4");
        $question->correct=Input::get("correct");
        $question->save();
        $ques=DB::table('tests')->where('id',$data)->value('ques');
        $ques=$ques+1;
        DB::table('tests')->where('id',$data)->update(['ques' => $ques]);
        return redirect()->intended(route('teacher.test.view',$data));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Test;
        $test->ques=0;
        $teacher= Auth::user()->email;
        $test->email = $teacher;
        $test->subject=Input::get("subject");
        $test->class=Input::get("class");
        $test->save();
        return redirect()->intended(route('teacher.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
