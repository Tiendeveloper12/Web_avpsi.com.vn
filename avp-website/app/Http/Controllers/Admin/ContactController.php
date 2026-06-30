<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
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
     * Display a listing of contact submissions.
     */
    public function index(Request $request)
    {
        $this->checkAdmin();

        $search = $request->input('search');
        $readFilter = $request->input('read');
        $flagFilter = $request->input('flagged');

        $query = DB::table('contact');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        if ($readFilter !== null && $readFilter !== '') {
            $query->where('read', (int) $readFilter);
        }

        if ($flagFilter !== null && $flagFilter !== '') {
            $query->where('flagged', (int) $flagFilter);
        }

        $contacts = $query->orderBy('created_at', 'desc')
            ->paginate(20)
            ->withQueryString();

        // Stats
        $stats = [
            'total' => DB::table('contact')->count(),
            'unread' => DB::table('contact')->where('read', 0)->count(),
            'read' => DB::table('contact')->where('read', 1)->count(),
            'flagged' => DB::table('contact')->where('flagged', 1)->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'stats'));
    }

    /**
     * Toggle read/unread status of a contact submission.
     */
    public function toggleRead($id)
    {
        $this->checkAdmin();

        $contact = DB::table('contact')->where('id', $id)->first();
        if (!$contact) {
            abort(404, 'Contact submission not found.');
        }

        DB::table('contact')->where('id', $id)->update([
            'read' => $contact->read ? 0 : 1,
            'updated_at' => now(),
        ]);

        $label = $contact->read ? 'chưa đọc' : 'đã đọc';
        return redirect()->back()->with('success', 'Tin nhắn #' . $id . ' đã được đánh dấu là ' . $label . '.');
    }

    /**
     * Toggle flagged/important status of a contact submission.
     */
    public function toggleFlag($id)
    {
        $this->checkAdmin();

        $contact = DB::table('contact')->where('id', $id)->first();
        if (!$contact) {
            abort(404, 'Contact submission not found.');
        }

        $flagged = property_exists($contact, 'flagged') ? $contact->flagged : 0;

        DB::table('contact')->where('id', $id)->update([
            'flagged' => $flagged ? 0 : 1,
            'updated_at' => now(),
        ]);

        $label = $flagged ? 'bỏ đánh dấu quan trọng' : 'đánh dấu quan trọng';
        return redirect()->back()->with('success', 'Tin nhắn #' . $id . ' đã được ' . $label . '.');
    }

    /**
     * Delete a contact submission.
     */
    public function destroy($id)
    {
        $this->checkAdmin();

        $contact = DB::table('contact')->where('id', $id)->first();
        if (!$contact) {
            abort(404, 'Contact submission not found.');
        }

        DB::table('contact')->where('id', $id)->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Tin nhắn #' . $id . ' đã được xóa vĩnh viễn.');
    }

    /**
     * Mark all unread messages as read.
     */
    public function markAllRead()
    {
        $this->checkAdmin();

        $count = DB::table('contact')->where('read', 0)->update([
            'read' => 1,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Đã đánh dấu ' . $count . ' tin nhắn là đã đọc.');
    }
}
