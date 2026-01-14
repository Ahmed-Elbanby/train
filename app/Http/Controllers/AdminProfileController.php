<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'username' => 'required|unique:admins,username,' . $admin->id,
            'password' => 'nullable|min:6',
            'phone' => 'required|max:15',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($admin->photo) {
                Storage::disk('public')->delete($admin->photo);
            }

            $data['photo'] = $request->file('photo')
                ->store('admins', 'public');
        }

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        return response()->json(['status' => 'profile updated']);
    }
}
