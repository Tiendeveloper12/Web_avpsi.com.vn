<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch specific printers for the top section (IDs 73, 74, 75, 76, 77)
        $topPrinters = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->whereIn('product.id', [73, 74, 75, 76, 77])
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->get();

        // Fetch photocopy machines for the second section
        $photocopiers = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.tags', 'like', '%photocopy%')
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->orderBy('product.created_at', 'desc')
            ->get();

        // Fetch specific featured products in the user-requested order
        $featuredIds = [155, 156, 157, 44, 43, 42, 41, 431, 432, 433, 447, 448, 476, 477, 488, 497, 506, 512, 526, 527];

        $products = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->whereIn('product.id', $featuredIds)
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->orderByRaw('FIELD(product.id, ' . implode(',', $featuredIds) . ')')
            ->get();

        // Fetch office machines (tag: van-phong), maximum 7
        $officeProducts = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.tags', 'like', '%van-phong%')
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->orderBy('product.created_at', 'desc')
            ->limit(7)
            ->get();

        // Fetch internet products (tag: internet), maximum 7
        $internetProducts = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.tags', 'like', '%internet%')
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->orderBy('product.created_at', 'desc')
            ->limit(7)
            ->get();

        // Fetch latest articles for blog section
        $articles = DB::table('article')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('home.index', compact('products', 'articles', 'topPrinters', 'photocopiers', 'officeProducts', 'internetProducts'));
    }
}