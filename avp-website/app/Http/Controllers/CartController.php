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
}
