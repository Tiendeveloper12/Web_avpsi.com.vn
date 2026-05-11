<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        // Fetch all galleries
        $galleries = DB::table('gallery')->get();

        return view('gallery.index', ['galleries' => $galleries]);
    }

    public function show($id)
    {
        // Fetch single gallery with all photos
        $gallery = DB::table('gallery')->where('id', $id)->first();
        $photos = DB::table('photo')->where('gallery_id', $id)->get();

        return view('gallery.show', ['gallery' => $gallery, 'photos' => $photos]);
    }
}