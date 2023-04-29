<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_to_cart(product $product, Request $request)
    {
        $request->validate( [
            'amount' => 'required|gte:1'
        ]);

        $user_id = Auth::id();
        $product_id = $product->id;

        Cart::create( [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $request->amount,
        ]);

        return Redirect::route('index_product');
    }
}
