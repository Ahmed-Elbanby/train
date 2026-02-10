<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('translations');
        return view('admins.products', compact('categories'));
    }

    /**
     * Display Create Product Modal.
     */
    public function createModal()
    {
        $parentCategories = Category::with('translations')->get()->where('parent_category', '=', null);
        return view('modals.products.create-modal', compact('parentCategories'));
    }

    /**
     * Display Edit Product Modal.
     */
    public function editModal($id)
    {
        $product = Product::with(['translations', 'category'])->findOrFail($id);
        $parentCategories = Category::with('translations')->get()->where('parent_category', '=', null);
        return view('modals.products.edit-modal', compact('product', 'parentCategories'));
    }

    /**
     * Return datatables JSON for AJAX requests
     */
    public function data(Request $request)
    {
        try {
            $query = Product::with('translations');

            return DataTables::of($query)
                ->addColumn('name_en', function (Product $product) {
                    return $product->translate('en')->name ?? '';
                })
                ->addColumn('name_ar', function (Product $product) {
                    return $product->translate('ar')->name ?? '';
                })
                ->addColumn('Category', function (Product $product) {
                    $cat = $product->category;
                    if (!$cat)
                        return '';
                    // try current locale then fallback to en
                    $name = $cat->translate(app()->getLocale())->name ?? $cat->translate('en')->name ?? '';
                    return $name;
                })
                // Handle searching by category name (category column in the JS is named 'category')
                ->filterColumn('category', function ($query, $keyword) {
                    $query->whereHas('category.translations', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    });
                })
                ->addColumn('actions', function (Product $product) {
                    $editUrl = route('products.edit-modal', $product->id);
                    $deleteBtn = '<button class="btn btn-sm btn-danger delete-btn" data-id="' . $product->id . '">Delete</button>';
                    $editBtn = '<button class="btn btn-sm btn-info edit-btn" data-modal="' . $editUrl . '">Edit</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        } catch (\Throwable $e) {
            Log::error('Products data endpoint failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to load products data: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'has_offer' => 'boolean',
            'offer_type' => 'nullable|required_if:has_offer,1|in:percent,value',
            'offer_amount' => 'nullable|required_if:has_offer,1|numeric|min:0',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'details_en' => 'nullable|string',
            'details_ar' => 'nullable|string',
        ]);

        $productCategoryId = $validated['sub_category_id'] ?? $validated['category_id'];

        try {
            $product = Product::create([
                'category_id' => $productCategoryId,
                'price' => $validated['price'],
                'has_offer' => $validated['has_offer'] ?? false,
                'offer_type' => $validated['offer_type'] ?? null,
                'offer_amount' => $validated['offer_amount'] ?? null,
            ]);

            // Save translations
            $product->translateOrNew('en')->name = $validated['name_en'];
            $product->translateOrNew('en')->details = $validated['details_en'];
            $product->translateOrNew('ar')->name = $validated['name_ar'];
            $product->translateOrNew('ar')->details = $validated['details_ar'];

            $product->save();

            if ($request->ajax()) {
                return response()->json(['message' => 'Product created successfully.', 'product' => $product], 201);
            }

            return redirect()->route('admins.products.index')->with('success', 'Product created successfully.');
        } catch (\Throwable $e) {
            Log::error('Product store failed: ' . $e->getMessage());
            if ($request->ajax()) {
                return response()->json(['message' => 'Product store failed: ' . $e->getMessage()], 500);
            }
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('translations')->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load('translations');
        if (request()->ajax()) {
            return response()->json($product);
        }

        return view('admins.products_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'has_offer' => 'boolean',
            'offer_type' => 'nullable|required_if:has_offer,1|in:percent,value',
            'offer_amount' => 'nullable|required_if:has_offer,1|numeric|min:0',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'details_en' => 'nullable|string',
            'details_ar' => 'nullable|string',
        ]);

        $productCategoryId = $validated['sub_category_id'] ?? $validated['category_id'];

        try {
            $product->update([
                'category_id' => $productCategoryId,
                'price' => $validated['price'],
                'has_offer' => $validated['has_offer'] ?? false,
                'offer_type' => $validated['offer_type'] ?? null,
                'offer_amount' => $validated['offer_amount'] ?? null,
            ]);

            // Update translations
            $product->translateOrNew('en')->name = $validated['name_en'];
            $product->translateOrNew('en')->details = $validated['details_en'];
            $product->translateOrNew('ar')->name = $validated['name_ar'];
            $product->translateOrNew('ar')->details = $validated['details_ar'];

            $product->save();

            if ($request->ajax()) {
                return response()->json(['message' => 'Product updated successfully.', 'product' => $product]);
            }

            return redirect()->route('admins.products.index')->with('success', 'Product updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Product update failed: ' . $e->getMessage());
            if ($request->ajax()) {
                return response()->json(['message' => 'Product update failed: ' . $e->getMessage()], 500);
            }
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            if (request()->ajax()) {
                return response()->json(['message' => 'Product deleted successfully.']);
            }

            return redirect()->route('admins.products.index')->with('success', 'Product deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Product delete failed: ' . $e->getMessage());
            if (request()->ajax()) {
                return response()->json(['message' => 'Product delete failed: ' . $e->getMessage()], 500);
            }
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
