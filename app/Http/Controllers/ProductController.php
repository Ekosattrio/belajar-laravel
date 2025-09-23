<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function form()
    {
        // tampilkan form input angka
        return view('products.form');
    }

    public function process(Request $request)
    {
        $angka = $request->input('angka');
        $hasil = $angka + 10; 

        return view('products.index', compact('angka', 'hasil'));
    }

    public function barang()
    {
        $barang   = "Laptop";
        $isi_data = "ASUS ROG 2025";

        return view('barang', compact('barang', 'isi_data'));
    }

    public function produkk()
    {
        $barangs   = "HP";
        $isi_datas = "ASUS ROG 2025";

        return view('produkk', [
            'barangs'    => $barangs,
            'isi_datas'  => $isi_datas,
            'message'    => 'Selamat belajar Blade',
            'type'       => 'success'
        ]);
    }
}
