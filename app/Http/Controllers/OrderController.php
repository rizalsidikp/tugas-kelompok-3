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
                'orders_id' => $order->id,
                'product_id' => $cart->product_id
            ]);

            $cart->delete();
        }

        return Redirect::back();

    }

    public function index_order()
    {
        $orders = orders::all();
        return view('orders.index_order', compact('orders'));
    }

    public function show_order(orders $order)
    
    {
        return view('orders.show_order', compact('order'));
    }
}