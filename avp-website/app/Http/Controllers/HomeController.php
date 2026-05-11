<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
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

        return view('home.index', compact('products', 'articles'));
    }
}