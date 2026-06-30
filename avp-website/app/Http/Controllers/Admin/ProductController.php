<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Helper check to verify admin credentials
     */
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role_id < 1) {
            abort(403, 'Unauthorized access.');
        }
        if (Auth::user()->status === 'suspended') {
            abort(403, 'Tài khoản của bạn đã bị khóa.');
        }
    }

    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $this->checkAdmin();

        $search = $request->input('search');
        $status = $request->input('status');

        $query = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->select('product.*', 'variant.price as sell', 'variant.stock_quant as variant_stock');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('product.title', 'like', '%' . $search . '%')
                  ->orWhere('product.description', 'like', '%' . $search . '%');
            });
        }

        if ($status) {
            $query->where('product.status', $status);
        }

        $products = $query->orderBy('product.created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $this->checkAdmin();
        $categories = \App\Services\CategoryService::getAll();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quant' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'main_category' => 'required|string',
            'subcategories' => 'nullable|array',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
        }

        // Build tags string
        $tagsList = [$request->input('main_category')];
        if ($request->has('subcategories')) {
            $tagsList = array_merge($tagsList, $request->input('subcategories'));
        }
        $tags = ',' . implode(',', array_filter($tagsList));

        // Insert product
        $productId = DB::table('product')->insertGetId([
            'title' => $request->input('title'),
            'description' => $request->input('description') ?? '',
            'content' => $request->input('description') ?? '',
            'image' => $imageName,
            'sell' => $request->input('price'),
            'tags' => $tags,
            'status' => 'active',
            'stop_selling' => 'publish',
            'stock_manage' => 0,
            'stock_quant' => $request->input('stock_quant'),
            'view' => 0,
            'rating' => 5,
            'priority' => 0,
            'template' => 'product',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert variant
        DB::table('variant')->insert([
            'title' => 'Default',
            'product_id' => $productId,
            'price' => $request->input('price'),
            'stock_quant' => $request->input('stock_quant'),
            'status' => 'active',
            'weight' => 0,
            'price_compare' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $this->checkAdmin();

        $product = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.id', $id)
            ->select('product.*', 'variant.price as sell', 'variant.stock_quant as variant_stock')
            ->first();

        if (!$product) {
            abort(404, 'Product not found.');
        }

        // Parse tags
        $tags = array_filter(explode(',', $product->tags));

        $categories = \App\Services\CategoryService::getAll();
        return view('admin.products.edit', compact('product', 'tags', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $this->checkAdmin();

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quant' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'main_category' => 'required|string',
            'subcategories' => 'nullable|array',
        ]);

        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            abort(404, 'Product not found.');
        }

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && File::exists(public_path('images/products/' . $product->image))) {
                File::delete(public_path('images/products/' . $product->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
        }

        // Build tags string
        $tagsList = [$request->input('main_category')];
        if ($request->has('subcategories')) {
            $tagsList = array_merge($tagsList, $request->input('subcategories'));
        }
        $tags = ',' . implode(',', array_filter($tagsList));

        // Update product
        DB::table('product')->where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description') ?? '',
            'content' => $request->input('description') ?? '',
            'image' => $imageName,
            'sell' => $request->input('price'),
            'tags' => $tags,
            'stock_quant' => $request->input('stock_quant'),
            'updated_at' => now(),
        ]);

        // Update variant
        DB::table('variant')->where('product_id', $id)->update([
            'price' => $request->input('price'),
            'stock_quant' => $request->input('stock_quant'),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    /**
     * Toggle visibility of the specified product.
     */
    public function toggleVisibility($id)
    {
        $this->checkAdmin();

        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            abort(404, 'Product not found.');
        }

        $newStatus = $product->status === 'active' ? 'inactive' : 'active';
        $newStopSelling = $newStatus === 'active' ? 'publish' : 'suspend';

        DB::table('product')->where('id', $id)->update([
            'status' => $newStatus,
            'stop_selling' => $newStopSelling,
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Trạng thái hiển thị sản phẩm đã được thay đổi thành công!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $this->checkAdmin();

        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            abort(404, 'Product not found.');
        }

        // Delete image if exists
        if ($product->image && File::exists(public_path('images/products/' . $product->image))) {
            File::delete(public_path('images/products/' . $product->image));
        }

        // Delete records
        DB::table('variant')->where('product_id', $id)->delete();
        DB::table('product')->where('id', $id)->delete();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}
