<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sub = $request->input('sub');
        $brand = $request->input('brand');

        // Base query with join for price
        $query = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.status', 'active')
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell');

        // Search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('product.title', 'like', '%' . $search . '%')
                  ->orWhere('product.description', 'like', '%' . $search . '%');
            });
        }

        // Sub-category filter
        if ($sub) {
            $query->where('product.tags', 'like', '%' . $sub . '%');
        }

        // Brand filter
        if ($brand) {
            $query->where('product.tags', 'like', '%' . $brand . '%');
        }

        // Sort
        $sort = $request->input('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('variant.price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('variant.price', 'desc');
                break;
            case 'popular':
                $query->orderBy('product.view', 'desc');
                break;
            case 'newest':
            default:
                if ($request->has('search') && !empty($request->input('search'))) {
                    $search = $request->input('search');
                    $query->orderByRaw("CASE WHEN product.title LIKE ? THEN 1 ELSE 0 END DESC", ['%' . $search . '%']);
                }
                $query->orderBy('product.created_at', 'desc');
                break;
        }

        // Get products
        $products = $query->paginate(12)->withQueryString();

        return view('products.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.id', $id)
            ->where('product.status', 'active')
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->first();

        if (!$product) {
            abort(404, 'Sản phẩm không tồn tại.');
        }

        // Fetch similar products based on shared tags
        $relatedProducts = collect();
        if (!empty($product->tags)) {
            $tags = array_filter(array_map('trim', explode(',', $product->tags)));
            if (!empty($tags)) {
                $query = DB::table('product')
                    ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
                    ->where('product.id', '!=', $product->id)
                    ->select('product.*', 'variant.price as variant_price', 'variant.price as sell');

                $query->where(function ($q) use ($tags) {
                    foreach ($tags as $tag) {
                        $q->orWhere('product.tags', 'like', '%' . $tag . '%');
                    }
                });

                $relatedProducts = $query
                    ->orderBy('product.created_at', 'desc')
                    ->limit(5)
                    ->get();
            }
        }

        // Fetch approved reviews with user details
        $reviews = DB::table('reviews')
            ->leftJoin('user', 'reviews.user_id', '=', 'user.id')
            ->where('reviews.product_id', $id)
            ->where('reviews.status', 'approved')
            ->select('reviews.*', 'user.name as user_name')
            ->orderBy('reviews.created_at', 'desc')
            ->get();

        $reviewsCount = $reviews->count();
        $avgRating = $reviewsCount > 0 ? round($reviews->avg('rating'), 1) : 0;

        // Star distribution
        $starDistribution = [
            5 => 0,
            4 => 0,
            3 => 0,
            2 => 0,
            1 => 0,
        ];
        foreach ($reviews as $review) {
            $r = (int)$review->rating;
            if (isset($starDistribution[$r])) {
                $starDistribution[$r]++;
            }
        }

        return view('products.show', [
            'product' => $product, 
            'relatedProducts' => $relatedProducts,
            'reviews' => $reviews,
            'reviewsCount' => $reviewsCount,
            'avgRating' => $avgRating,
            'starDistribution' => $starDistribution
        ]);
    }

    public function category($slug)
    {
        // Mapping slug to display title
        $categoryTitles = \App\Services\CategoryService::getCategoryTitles();

        $title = $categoryTitles[$slug] ?? 'Danh mục sản phẩm';
        
        // Map slug to database tag (simplified mapping for now)
        $tagMapping = \App\Services\CategoryService::getTagMapping();

        $tag = $tagMapping[$slug] ?? $slug;
        $sub = request('sub');
        $brand = request('brand');

        // Fetch products with matching tags and join with variant for price
        $query = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.tags', 'like', '%' . $tag . '%')
            ->where('product.status', 'active')
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->orderBy('product.created_at', 'desc');

        if ($sub) {
            $query->where('product.tags', 'like', '%' . $sub . '%');
        }

        if ($brand) {
            $query->where('product.tags', 'like', '%' . $brand . '%');
        }

        $products = $query->paginate(12)->withQueryString();

        return view('products.category', [
            'title' => $title,
            'slug' => $slug,
            'products' => $products
        ]);
    }

    public function searchJson(Request $request)
    {
        $search = $request->input('q');

        if (!$search) {
            return response()->json([]);
        }

        $products = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.status', 'active')
            ->where(function($q) use ($search) {
                $q->where('product.title', 'like', '%' . $search . '%')
                  ->orWhere('product.description', 'like', '%' . $search . '%');
            })
            ->select('product.id', 'product.title', 'product.image', 'variant.price as sell')
            ->orderByRaw("CASE WHEN product.title LIKE ? THEN 1 ELSE 0 END DESC", ['%' . $search . '%'])
            ->orderBy('product.created_at', 'desc')
            ->limit(6)
            ->get();

        return response()->json($products);
    }
}