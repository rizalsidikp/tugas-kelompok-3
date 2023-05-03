<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\product;


class TransactionController extends Controller
{
    public function indexByProduct($product)
    {
        $transactions = Transaction::where('product_id', $product)->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->get();
        $totalHargaBeli = Transaction::selectRaw('SUM(harga_beli * amount) as total_harga_beli')->where('product_id', $product)->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->pluck('total_harga_beli')->first();
        $totalHargaJual = Transaction::selectRaw('SUM(harga_jual * amount) as total_harga_jual')->where('product_id', $product)->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->pluck('total_harga_jual')->first();
        $maxAmount = Transaction::where('product_id', $product)->where('amount', Transaction::where('product_id', $product)->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->max('amount'))->orderBy('id', 'desc')->first();
        $totalPenjualan = Transaction::where('product_id', $product)->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->sum('amount');
        $product = product::where('id', $product)->first();
        return view('product.report_product', compact('transactions', 'product', "totalHargaBeli", "totalHargaJual", "maxAmount", "totalPenjualan"));
    }
    public function index()
    {
        // table transaksi
        $transactions = Transaction::selectRaw('
        product_id, sum(amount) as total_amount, 
        sum(harga_beli * amount) as total_harga_beli, 
        sum(harga_jual * amount) as total_harga_jual, 
        (sum(harga_jual * amount) - sum(harga_beli * amount)) as keuntungan')
            ->whereHas('orders', function ($query) {
                $query->where('confirmed', 1);
            })
            ->groupBy('product_id')->get();

        // product andalan
        $andalan = Transaction::selectRaw('
        product_id, sum(amount) as total_amount, 
        sum(harga_beli * amount) as total_harga_beli, 
        sum(harga_jual * amount) as total_harga_jual, 
        (sum(harga_jual * amount) - sum(harga_beli * amount)) as keuntungan')
            ->whereHas('orders', function ($query) {
                $query->where('confirmed', 1);
            })
            ->groupBy('product_id')->orderByDesc('keuntungan')
            ->first();

        // product terlaris
        $terlaris = Transaction::selectRaw('
        product_id, sum(amount) as total_amount, 
        sum(harga_beli * amount) as total_harga_beli, 
        sum(harga_jual * amount) as total_harga_jual, 
        (sum(harga_jual * amount) - sum(harga_beli * amount)) as keuntungan')
            ->whereHas('orders', function ($query) {
                $query->where('confirmed', 1);
            })
            ->groupBy('product_id')->orderByDesc('total_amount')
            ->first();



        // jumlah transaksi
        $orders = Transaction::selectRaw('orders_id')->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->groupBy('orders_id')->get()->count();


        //total keuntungan
        $totalHargaBeli = Transaction::selectRaw('SUM(harga_beli * amount) as total_harga_beli')->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->pluck('total_harga_beli')->first();
        $totalHargaJual = Transaction::selectRaw('SUM(harga_jual * amount) as total_harga_jual')->whereHas('orders', function ($query) {
            $query->where('confirmed', 1);
        })->pluck('total_harga_jual')->first();

        return view('report.index', compact('transactions', 'totalHargaBeli', 'totalHargaJual', 'orders', 'terlaris', 'andalan'));
    }
}