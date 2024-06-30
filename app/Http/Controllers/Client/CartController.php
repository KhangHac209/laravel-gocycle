<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $subtotal = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
            $subtotal += $item['price'] * $item['qty'];
        }

        $total = $subtotal;

        return view("client.pages.cart", compact('cart', 'subtotal', 'total'));
    }

    public function destroy()
    {
        session()->put('cart', []);
        return response()->json(['message' => 'Xóa giỏ hàng thành công']);
    }

    public function add(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->qty;
        $product = Product::find($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'qty' => $quantity,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);

        // Calculate updated subtotal and total
        $subtotal = $cart[$productId]['price'] * $cart[$productId]['qty'];
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['qty'];
        }, $cart));

        return response()->json([
            'productId' => $productId,
            'qty' => $cart[$productId]['qty'],
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
    }
}
