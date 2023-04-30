<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\orders;
use App\Models\Transaction;
use App\Models\product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        if($carts == null )
        {
            return Redirect::back();
        }

        $order = orders::create([
            'user_id' => $user_id
        ]);

        foreach ($carts as $cart)
        {

            $product = product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);

            $cart->delete();
        }

        return Redirect::back();

    }
}