<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use App\Utils\LocalizedString;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('translations')->get();
        return view('admins.categories', compact('categories'));
    }

    /**
     * Display Create Category Modal.
     */
    public function createModal()
    {
        return view('modals.categories.create-modal');
    }

    /**
     * Display Edit Category Modal.
     */
    public function editModal($id)
    {
        $category = Category::with('translations')->findOrFail($id);
        return view('modals.categories.edit-modal', compact('category'));
    }

    /**
     * Return datatables JSON for AJAX requests
     */
    public function data(Request $request)
    {
        try {
            $query = Category::with('translations');

            return DataTables::of($query)
                // ->addColumn('photo', function (Category $category) {
                //     $url = $category->photo ? asset('storage/' . $category->photo) : asset('assets/img/avatar.png');
                //     return '<img src="' . $url . '" style="width:40px;height:40px;border-radius:6px;object-fit:cover"/>';
                // })
                ->addColumn('photo', function (Category $category) {
                    if ($category->photo && \Storage::disk('public')->exists($category->photo)) {
                        $url = \Storage::url($category->photo);
                    } else {
                        $url = asset('assets/img/avatar.png');
                    }

                    return '<img src="' . $url . '" class="rounded-circle sm avatar" alt="' . e($category->translate('en')->name ?? '') . '" style="width:40px;height:40px;object-fit:cover;">';
                })
                ->addColumn('name_en', function (Category $category) {
                    return $category->translate('en')->name ?? '';
                })
                ->addColumn('name_ar', function (Category $category) {
                    return $category->translate('ar')->name ?? '';
                })
                ->addColumn('actions', function (Category $category) {
                    $editUrl = route('categories.edit-modal', $category->id);
                    $deleteBtn = '<button class="btn btn-sm btn-danger delete-btn" data-id="' . $category->id . '">Delete</button>';
                    $editBtn = '<button class="btn btn-sm btn-info edit-btn" data-modal="' . $editUrl . '">Edit</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['photo', 'actions'])
                ->make(true);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Failed to load categories data: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $validated = $request->validate([
                'name_en' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $category = new Category();

            $category->translateOrNew('en')->name = $validated['name_en'];
            $category->translateOrNew('ar')->name = $validated['name_ar'];
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('categories', 'public');
                $category->photo = $path;
            }

            $category->save();
            
            return response()->json([
                'success' => true,
                'message' => __('Category created successfully')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
