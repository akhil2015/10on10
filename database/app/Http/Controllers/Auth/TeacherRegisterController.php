<?php


namespace App\Http\Controllers\Auth;

use App\Teacher as Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class TeacherRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/teacher';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showRegistrationForm()
    {
        return view('auth.teacher-register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|string|max:10|min:10|unique',
            'institute' => 'string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
    public function store(Request $request)
    {
        $teacher = new Teacher;
        $teacher->name=Input::get("name");;
        $teacher->email=Input::get("email");
        $teacher->password=Hash::make(Input::get("password"));
        $teacher->mobile=Input::get("mobile");
        $teacher->institute=Input::get("institute");
        $teacher->save();
        return redirect()->intended(route('teacher.dashboard'))->with('alert', 'You are now registered');;
    }
}
