<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfileForm()
    {
        return view("auth.profile", ["user" => Auth::user()]);
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->only(["name", "email"]);

        if ($request->filled("password")) {
            $data["password"] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route("profile")->with("status", "Profile updated successfully.");
    }
}
