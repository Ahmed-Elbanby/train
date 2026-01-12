<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $credentials['email'])
            ->first();

        if (!$admin) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 422);
        }

        if (!$admin->is_active) {
            return response()->json([
                'message' => 'Your account is inactive'
            ], 422);
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['status' => 'success']);
        }
        
        return response()->json([
            'message' => 'Invalid credentials'
        ], 422);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['status' => 'logged_out']);
    }
}
