<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\product;


class TransactionController extends Controller
{
    public function indexByProduct($product)
    {
        $transactions = Transaction::where('product_id', $product)->get();
        $totalHargaBeli = Transaction::selectRaw('SUM(harga_beli * amount) as total_harga_beli')->where('product_id', $product)->pluck('total_harga_beli')->first();
        $totalHargaJual = Transaction::selectRaw('SUM(harga_jual * amount) as total_harga_jual')->where('product_id', $product)->pluck('total_harga_jual')->first();
        $maxAmount = Transaction::where('product_id', $product)->where('amount', Transaction::where('product_id', $product)->max('amount'))->orderBy('id', 'desc')
            ->first();
        $totalPenjualan = Transaction::where('product_id', $product)->sum('amount');
        $product = product::where('id', $product)->first();
        return view('product.report_product', compact('transactions', 'product', "totalHargaBeli", "totalHargaJual", "maxAmount", "totalPenjualan"));
    }
}