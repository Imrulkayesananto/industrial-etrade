<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class CustomerAuthController extends Controller
{

    use RegistersUsers;
    use AuthenticatesUsers;

    protected $redirectTo = '/my-profile';

    function showLoginForm(){
        return view('auth.customer.sign-in');
    }
    function showRegisterForm(){
        return view('auth.customer.sign-up');
    }


    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }


    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    function myProfile() {
        return view('frontend.my-account');
    }
}
