<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'nama' => 'T-Shirt Unisex',
                'deskripsi' => 'T-Shirt dengan model unisex yang cocok dipakai oleh pria maupun wanita. Terbuat dari bahan katun berkualitas tinggi yang nyaman dipakai.',
                'jenis_barang' => 'Pakaian',
                'stock' => 50,
                'harga_beli' => 50000,
                'harga_jual' => 75000,
                'gambar' => ""
            ],
            [
                'nama' => 'T-Shirt Basic',
                'deskripsi' => 'T-Shirt dengan model basic yang cocok dipakai sehari-hari. Terbuat dari bahan katun berkualitas tinggi yang nyaman dipakai.',
                'jenis_barang' => 'Pakaian',
                'stock' => 30,
                'harga_beli' => 30000,
                'harga_jual' => 50000,
                'gambar' => ""
            ],
            [
                'nama' => 'Sneakers Casual',
                'deskripsi' => 'Sneakers dengan model casual yang cocok dipakai sehari-hari. Terbuat dari bahan sintetis berkualitas tinggi yang nyaman dipakai.',
                'jenis_barang' => 'Sepatu',
                'stock' => 20,
                'harga_beli' => 50000,
                'harga_jual' => 80000,
                'gambar' => ""
            ],
            [
                'nama' => 'Sneakers Running',
                'deskripsi' => 'Sneakers yang dirancang khusus untuk kegiatan lari. Terbuat dari bahan mesh yang ringan dan breathable untuk memberikan kenyamanan pada kaki.',
                'jenis_barang' => 'Sepatu',
                'stock' => 20,
                'harga_beli' => 55000,
                'harga_jual' => 95000,
                'gambar' => ""
            ],
            [
                'nama' => 'Kaftan Wanita',
                'deskripsi' => 'Kaftan dengan model simple dan elegan yang cocok dipakai untuk acara formal atau non formal. Terbuat dari bahan rayon yang ringan dan nyaman dipakai.',
                'jenis_barang' => 'Pakaian',
                'stock' => 30,
                'harga_beli' => 60000,
                'harga_jual' => 80000,
                'gambar' => ""
            ],
            [
                'nama' => 'Backpack Classic',
                'deskripsi' => 'Backpack dengan desain klasik yang cocok dipakai untuk berbagai keperluan. Terbuat dari bahan kulit sintetis yang tahan lama.',
                'jenis_barang' => 'Tas',
                'stock' => 15,
                'harga_beli' => 60000,
                'harga_jual' => 90000,
                'gambar' => ""
            ],
            [
                'nama' => 'Headset Earbud',
                'deskripsi' => 'Headset dengan model earbud yang nyaman dipakai. Dilengkapi dengan mikrofon dan tombol kontrol untuk mengatur volume dan memutar lagu.',
                'jenis_barang' => 'Elektronik',
                'stock' => 25,
                'harga_beli' => 25000,
                'harga_jual' => 60000,
                'gambar' => ""
            ],
            [
                'nama' => 'Sweatshirt Hoodie',
                'deskripsi' => 'Sweatshirt dengan model hoodie yang cocok dipakai saat cuaca dingin. Terbuat dari bahan katun berkualitas tinggi dan dilengkapi dengan kantong di bagian depan.',
                'jenis_barang' => 'Pakaian',
                'stock' => 15,
                'harga_beli' => 55000,
                'harga_jual' => 90000,
                'gambar' => ""
            ],
            [
                'nama' => 'Buku Non-Fiksi',
                'deskripsi' => 'Buku tentang sejarah yang menarik untuk dibaca. Ditulis oleh penulis terkenal dan dilengkapi dengan ilustrasi yang menarik.',
                'jenis_barang' => 'Buku',
                'stock' => 5,
                'harga_beli' => 40000,
                'harga_jual' => 80000,
                'gambar' => ""
            ],
            [
                'nama' => 'Blouse Chiffon',
                'deskripsi' => 'Blouse dengan model chiffon yang cocok dipakai untuk acara formal. Dilengkapi dengan pita di leher dan kancing di bagian depan.',
                'jenis_barang' => 'Pakaian',
                'stock' => 12,
                'harga_beli' => 55000,
                'harga_jual' => 95000,
                'gambar' => ""
            ],
        ];
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->nama = $products[$i]['nama'];
            $product->deskripsi = $products[$i]['deskripsi'];
            $product->jenis_barang = $products[$i]['jenis_barang'];
            $product->stock = $products[$i]['stock'];
            $product->harga_beli = $products[$i]['harga_beli'];
            $product->harga_jual = $products[$i]['harga_jual'];
            $product->gambar = $products[$i]['gambar'];
            $product->save();
        }
    }
}