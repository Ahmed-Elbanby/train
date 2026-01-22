<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $admins = Admin::select(['id', 'name', 'email', 'username', 'phone', 'photo', 'created_at']);

            return DataTables::of($admins)
                ->addColumn('photo', function ($admin) {
                    if ($admin->photo && \Storage::disk('public')->exists($admin->photo)) {
                        $url = \Storage::url($admin->photo);
                    } else {
                        $url = asset('assets/img/avatar.png');
                    }

                    return '<img src="' . $url . '" class="rounded-circle sm avatar" alt="' . e($admin->name) . '" style="width:40px;height:40px;object-fit:cover;">';
                })
                ->addColumn('actions', function ($admin) {
                    $editBtn = '<button type="button" class="btn btn-link btn-sm color-400 edit-admin-btn" '
                        . 'data-admin-id="' . $admin->id . '" '
                        . 'data-admin-name="' . e($admin->name) . '" '
                        . 'data-admin-email="' . e($admin->email) . '" '
                        . 'data-admin-username="' . e($admin->username) . '" '
                        . 'data-admin-phone="' . e($admin->phone) . '" '
                        . 'data-admin-photo="' . ( ($admin->photo && \Storage::disk('public')->exists($admin->photo)) ? \Storage::url($admin->photo) : asset('assets/img/avatar.png') ) . '" '
                        . 'title="' . __('dash.edit') . '"><i class="fa fa-pencil"></i></button>';
                    
                    // $editBtn = '<button type="button" class="btn btn-link btn-sm color-400 edit-admin-btn" onclick=\"openEditModal(' . json_encode($admin) . ')\" '
                    // . ' title="' . __('dash.edit') . '"><i class="fa fa-pencil"></i></button>';

                    // $editBtn = "<button type='button' class='btn btn-link btn-sm color-400 edit-admin-btn' onclick='openEditModal(" . $admin . ")' title='" . __('dash.edit') . "'><i class='fa fa-pencil'></i></button>";

                    $deleteBtn = '';
                    if ($admin->id != auth('admin')->id()) {
                        $deleteBtn = '<form action="' . route('admins.destroy', $admin->id) . '" method="POST" class="d-inline delete-admin-form" id="delete_form_' . $admin->id . '">'
                            . '<input type="hidden" name="_token" value="' . csrf_token() . '">'
                            . '<input type="hidden" name="_method" value="DELETE">'
                            . '<button type="button" class="btn btn-link btn-sm color-400 delete-admin-btn" data-admin-id="' . $admin->id . '" data-admin-name="' . e($admin->name) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . __('dash.delete') . '">' . '<i class="fa fa-trash"></i></button>'
                            . '</form>';
                    }

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['photo', 'actions'])
                ->make(true);
        }

        return view('admins.index');
    }

    public function data()
    {
        $admins = Admin::query();

        return DataTables::of($admins)
            ->addIndexColumn()

            // ->editColumn('is_active', function ($admin) {
            //     return $admin->is_active
            //         ? '<span class="badge bg-success">Active</span>'
            //         : '<span class="badge bg-danger">Inactive</span>';
            // })

            ->addColumn('action', function ($admin) {
                return '
                <button class="btn btn-sm btn-primary editBtn" data-id="' . $admin->id . '">Edit</button>
                <button class="btn btn-sm btn-danger deleteBtn" data-id="' . $admin->id . '">Delete</button>
            ';
            })

            ->rawColumns(['action'])
            ->make(true);
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
                'phone' => ['nullable', 'regex:/^01[0-9]{9}$/'],
                'password' => 'required|min:6|confirmed',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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
            'phone' => ['nullable', 'regex:/^01[0-9]{9}$/'],
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