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

        $user_id = Auth::id();
        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id )
            ->where('user_id', $user_id)
            ->first();
        
        if($existing_cart == null)
        {
            $request->validate( [
                'amount' => 'required|gte:1|lte:' . $product->stock
            ]);
    
            Cart::create( [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);

        }
        else
        {
            $request->validate( [
                'amount' => 'required|gte:1|lte:' . $product->stock - $existing_cart->amount
            ]);

            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }



        return Redirect::route('show_cart');
    }

    public function show_cart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('cart.show_cart', compact('carts'));
    }

    public function update_cart(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('show_cart');

    }

    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::back();
    }
}
