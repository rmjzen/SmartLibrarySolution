<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserRegistrationNotification;

class RegisterController extends Controller
{
    public function view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $create = new User();
        $create->first_name = $request->input('first_name');
        $create->last_name = $request->input('last_name');
        $create->username = $request->input('username');
        $create->email = $request->input('email');
        $create->mobile_number = $request->input('mobile_number');
        $create->password = Hash::make($request->input('password'));
        $create->barcode = Str::random(10);
        $create->save();


        if ($create) {
            return redirect()->back()->with('success', 'Account created successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
