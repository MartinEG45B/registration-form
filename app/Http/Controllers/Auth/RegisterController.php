<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Userdetail;
use DateTime;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('clickjacking');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:5', 'max:20', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:userdetails'],
            'url' => ['nullable', 'url'], //nullable since laravel converts blank fields to null
            'dob' => ['required', function ($attribute, $value, $fail) {
            $current_date = new DateTime(date('Y-m-d'));
            $dob = new DateTime($value);
            $age = $current_date->diff($dob)->y;
            if($age < 18){
                $fail('You must be over 18 to register');
            }
            }],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Userdetail
     */
    protected function create(array $data)
    {

        return Userdetail::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'url' => $data['url'],
            'dob' => $data['dob']
        ]);
    }
}
