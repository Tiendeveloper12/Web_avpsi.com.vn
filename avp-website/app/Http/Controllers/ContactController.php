<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function create()
    {
        // Show contact form
        return view('contact.create');
    }

    public function store(Request $request)
    {
        // Validate the form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'content' => 'required|string|max:2000',
        ]);

        // Save to contact table
        DB::table('contact')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'content' => $validated['content'],
            'status' => 'active',
            'read' => 0,
            'reply' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with success message
        return redirect('/contact')->with('success', 'Thank you! Your message has been sent successfully.');
    }
}