<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function create_product()
    {
        return view('product.create_product');
    }

    public function store_product(Request $request)
    {
        $request->validate( [
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis_barang' => 'required',
            'stock' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'gambar' => 'required'
        ]);

        $file = $request->file('gambar');
        $path = time() . '_' . $request-> nama . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/images/' . $path, file_get_contents($file));

        product::create( [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis_barang' => $request->jenis_barang,
            'stock' => $request->stock,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'gambar' => $path
        ]);

        return Redirect::route('index_product');
    }

    public function index_product()
    {
        $products = product::all();
        return view('product.index_product', compact('products'));
    }

    public function show_product(product $product)
    {
        return view('product.show_product', compact('product'));
    }

    public function edit_product(product $product)
    {
        return view('product.edit_product', compact('product'));
    }

    public function update_product(product $product, Request $request)
    {
        $request->validate( [
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis_barang' => 'required',
            'stock' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'gambar' => 'image'
        ]);

        if ($request->hasFile('gambar')) {
            // Delete old image
            Storage::disk('public')->delete('images/' . $product->gambar);
    
            // Upload new image
            $file = $request->file('gambar');
            $path = time() . '_' . $request->nama . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $file, $path);
    
            // Update product with new image path
            $product->gambar = $path;
        }

        $product->update( [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis_barang' => $request->jenis_barang,
            'stock' => $request->stock,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);

        return Redirect::route('show_product', $product);
    }

    public function delete_product(product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}
