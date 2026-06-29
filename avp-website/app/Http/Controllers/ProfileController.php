<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show the customer profile and order history.
     */
    public function index()
    {
        $user = Auth::user();

        // Retrieve orders linked to this user by user_id OR matching their email
        $orders = DB::table('orders')
            ->where('user_id', $user->id)
            ->orWhere('customer_email', $user->email)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('profile.index', compact('user', 'orders'));
    }

    /**
     * Update customer profile details.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:1000'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Thông tin tài khoản đã được cập nhật thành công!');
    }

    /**
     * Show details of a customer order.
     */
    public function showOrder($id)
    {
        $user = Auth::user();

        $order = DB::table('orders')
            ->where('id', $id)
            ->where(function($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('customer_email', $user->email);
            })
            ->first();

        if (!$order) {
            abort(404, 'Đơn hàng không tồn tại.');
        }

        $items = DB::table('order_items')
            ->join('product', 'order_items.product_id', '=', 'product.id')
            ->where('order_items.order_id', $id)
            ->select('order_items.*', 'product.title', 'product.image')
            ->get();

        return view('profile.order', compact('order', 'items'));
    }
}
