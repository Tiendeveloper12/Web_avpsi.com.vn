<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('article');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate(9);

        // Convert created_at to Carbon objects for formatting
        $articles->getCollection()->transform(function ($item) {
            $item->created_at = \Carbon\Carbon::parse($item->created_at);
            return $item;
        });

        return view('blog.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = DB::table('article')->where('id', $id)->first();
        return view('blog.show', ['article' => $article]);
    }
}