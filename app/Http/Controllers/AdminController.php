<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    /**
     * Store a newly created admin in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Admin store request data:', $request->all());

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:admins',
                'username' => 'nullable|string|max:255|unique:admins',
                'phone' => 'nullable|string|max:20',
                'password' => 'required|min:6|confirmed',
                'photo' => 'nullable|image|max:2048'
            ]);

            \Log::info('Validation passed:', $validated);

            $admin = new Admin();
            $admin->name = $validated['name'];
            $admin->email = $validated['email'];
            // Ensure username is not empty - generate one if not provided
            if (!empty($validated['username'])) {
                $admin->username = $validated['username'];
            } else {
                $base = Str::slug($validated['name']);
                $candidate = $base;
                $i = 0;
                while (Admin::where('username', $candidate)->exists()) {
                    $i++;
                    $candidate = $base . ($i > 0 ? '-' . $i : '');
                }
                $admin->username = $candidate;
            }
            $admin->phone = $validated['phone'] ?? null;
            $admin->password = Hash::make($validated['password']);

            if ($request->hasFile('photo')) {
                \Log::info('Photo file present:', [
                    'name' => $request->file('photo')->getClientOriginalName(),
                    'size' => $request->file('photo')->getSize(),
                    'mime' => $request->file('photo')->getMimeType()
                ]);

                $path = $request->file('photo')->store('admins', 'public');
                $admin->photo = $path;
                \Log::info('Photo stored at: ' . $path);
            }

            $admin->save();

            \Log::info('Admin saved successfully. ID: ' . $admin->id);

            return response()->json([
                'success' => true,
                'message' => __('Admin created successfully')
            ]);

        } catch (\Exception $e) {
            \Log::error('Admin creation error: ' . $e->getMessage());
            \Log::error('Error trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified admin.
     */
    public function edit(Admin $admin)
    {
        return response()->json([
            'success' => true,
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified admin in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'username' => 'nullable|string|max:255|unique:admins,username,' . $admin->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|min:6|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        // Only update username if a non-empty value is provided
        if (isset($validated['username']) && $validated['username'] !== '') {
            $admin->username = $validated['username'];
        }
        $admin->phone = $validated['phone'] ?? $admin->phone;

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($admin->photo && Storage::disk('public')->exists($admin->photo)) {
                Storage::disk('public')->delete($admin->photo);
            }

            $path = $request->file('photo')->store('admin/photos', 'public');
            $admin->photo = $path;
        }

        $admin->save();

        return response()->json([
            'success' => true,
            'message' => __('Admin updated successfully')
        ]);
    }

    /**
     * Remove the specified admin from storage.
     */
    public function destroy(Admin $admin)
    {
        // Prevent deleting yourself
        if ($admin->id === auth('admin')->id()) {
            return response()->json([
                'success' => false,
                'message' => __('You cannot delete your own account')
            ], 403);
        }

        // Delete photo if exists
        if ($admin->photo && Storage::disk('public')->exists($admin->photo)) {
            Storage::disk('public')->delete($admin->photo);
        }

        $admin->delete();

        return response()->json([
            'success' => true,
            'message' => __('Admin deleted successfully')
        ]);
    }
}