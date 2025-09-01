<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        if (Auth::attempt(array('email' => $validated['email'], 'password' => $validated['password']))) {
            return redirect()->route('index');
        } else {
            $validator->errors()->add(
                'password', 'The password does not match with username'
            );
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function registerView(){
        return view('register');
    }

    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required',"confirmed", Password::min(7)],
            'staff_id' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'joining_date' => ['required', 'date'],
            'office_name' => ['required', 'string'],
            'directorate_name' => ['required', 'string'],
            'division_name' => ['required', 'string'],
            'district_name' => ['required', 'string'],
            'office_location' => ['required', 'string'],
            'section' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
            "staff_id" => $validated["staff_id"],
            "designation" => $validated["designation"],
            "phone" => $validated["phone"],
            "joining_date" => $validated["joining_date"],
            "office_name" => $validated["office_name"],
            "directorate_name" => $validated["directorate_name"],
            "division_name" => $validated["division_name"],
            "district_name" => $validated["district_name"],
            "office_location" => $validated["office_location"],
            "section" => $validated["section"],
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
