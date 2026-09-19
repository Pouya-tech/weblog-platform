<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    public function store(SignupRequest $request)
    {
        // dd($request->all());
        User::create($request->validated());



        // Enter Login page after signing in
        return redirect()->route('login')->with('success', 'You Have Been Signed Up successfully');
        // موقتاً برای تست:
        // dd($validated);
    }
}
