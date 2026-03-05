<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only(["name", "email", "password"]);
        $data["password"] = Hash::make($data["password"]);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route("home");
    }
}
