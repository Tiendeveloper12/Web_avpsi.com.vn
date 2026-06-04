<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        if (!empty($cart)) {
            $productIds = array_keys($cart);
            $products = DB::table('product')
                ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
                ->whereIn('product.id', $productIds)
                ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
                ->get();

            foreach ($products as $product) {
                $quantity = $cart[$product->id] ?? 1;
                $price = $product->sell ?? 0;
                $cartItems[] = (object) [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $price * $quantity,
                ];
                $total += $price * $quantity;
            }
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        session()->put('cart', $cart);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'cart_count' => array_sum($cart),
            ]);
        }

        if ($request->has('redirect_to_cart')) {
            return redirect()->route('cart.index');
        }

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if ($quantity <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = $quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $productIds = array_keys($cart);
        $products = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->whereIn('product.id', $productIds)
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->get();

        foreach ($products as $product) {
            $quantity = $cart[$product->id] ?? 1;
            $price = $product->sell ?? 0;
            $cartItems[] = (object) [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $price * $quantity,
            ];
            $total += $price * $quantity;
        }

        return view('cart.checkout', compact('cartItems', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'customer_address' => 'required|string|max:500',
            'customer_note' => 'nullable|string|max:1000',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $productIds = array_keys($cart);
        $products = DB::table('product')
            ->leftJoin('variant', 'product.id', '=', 'variant.product_id')
            ->whereIn('product.id', $productIds)
            ->select('product.*', 'variant.price as variant_price', 'variant.price as sell')
            ->get();

        $cartItems = [];
        $total = 0;
        foreach ($products as $product) {
            $quantity = $cart[$product->id] ?? 1;
            $price = $product->sell ?? 0;
            $cartItems[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ];
            $total += $price * $quantity;
        }

        DB::transaction(function () use ($request, $cartItems, $total) {
            $orderId = DB::table('orders')->insertGetId([
                'customer_name' => $request->input('customer_name'),
                'customer_phone' => $request->input('customer_phone'),
                'customer_email' => $request->input('customer_email'),
                'customer_address' => $request->input('customer_address'),
                'customer_note' => $request->input('customer_note'),
                'total_amount' => $total,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($cartItems as $item) {
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('home.index')->with('success', 'Đơn hàng của quý khách đã được tiếp nhận thành công! Âu Việt Phát sẽ liên hệ qua SĐT ' . $request->input('customer_phone') . ' hoặc Email ' . $request->input('customer_email') . ' sớm nhất để xác nhận giao hàng.');
    }
}
