<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'username' => 'required|unique:admins',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|max:15',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('admins', 'public');
        }

        Admin::create($data);

        return response()->json(['status' => 'registered']);
    }
}
