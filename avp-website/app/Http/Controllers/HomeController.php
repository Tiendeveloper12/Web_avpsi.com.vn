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
            ->join('variant', 'product.id', '=', 'variant.product_id')
            ->whereIn('product.id', [73, 74, 75, 76, 77])
            ->select('product.*', 'variant.price as variant_price')
            ->get();

        // Fetch photocopy machines for the second section
        $photocopiers = DB::table('product')
            ->join('variant', 'product.id', '=', 'variant.product_id')
            ->where('product.tags', 'like', '%photocopy%')
            ->select('product.*', 'variant.price as variant_price')
            ->orderBy('product.created_at', 'desc')
            ->get();

        // Fetch featured products (active status)
        $products = DB::table('product')
            ->where('status', 'active')
            ->orderBy('priority', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Fetch latest articles for blog section
        $articles = DB::table('article')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('home.index', compact('products', 'articles', 'topPrinters', 'photocopiers'));
    }
}