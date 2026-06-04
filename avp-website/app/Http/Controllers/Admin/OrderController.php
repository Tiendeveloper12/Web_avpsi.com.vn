<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Helper check to verify admin credentials
     */
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->email !== 'Admin1@gmail.com') {
            abort(403, 'Unauthorized access.');
        }
    }

    /**
     * Display a listing of orders.
     */
    public function index(Request $request)
    {
        $this->checkAdmin();

        // Get orders
        $orders = DB::table('orders')
            ->orderBy('created_at', 'desc')
            ->get();

        // Gather all order IDs to fetch items efficiently
        $orderIds = $orders->pluck('id')->toArray();

        $orderItems = [];
        if (!empty($orderIds)) {
            $items = DB::table('order_items')
                ->leftJoin('product', 'order_items.product_id', '=', 'product.id')
                ->whereIn('order_items.order_id', $orderIds)
                ->select('order_items.*', 'product.title', 'product.image')
                ->get()
                ->groupBy('order_id');
            
            foreach ($items as $orderId => $groupedItems) {
                $orderItems[$orderId] = $groupedItems;
            }
        }

        return view('admin.orders', compact('orders', 'orderItems'));
    }

    /**
     * Update the status of the specified order.
     */
    public function updateStatus(Request $request, $id)
    {
        $this->checkAdmin();

        $request->validate([
            'status' => 'required|string|in:pending,confirmed,shipping,completed,cancelled',
        ]);

        DB::table('orders')
            ->where('id', $id)
            ->update([
                'status' => $request->input('status'),
                'updated_at' => now(),
            ]);

        return redirect()->back()->with('success', 'Trạng thái đơn hàng #' . $id . ' đã được cập nhật thành công!');
    }
}
