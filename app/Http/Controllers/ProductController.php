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

        // setelah input, redirect ke route produk/{angka}
        return redirect()->route('produk.angka', ['angka' => $angka]);
    }

    public function produk($angka)
{
    // pastikan integer
    $angka = (int) $angka;

    // hitung +10
    $hasil = $angka + 10;

    // logika ganjil-genap
    if ($angka % 2 == 0) {
        $message = "Nilai ini adalah genap";
        $type = "success";  
    } else {
        $message = "Nilai ini adalah ganjil";
        $type = "warning";
    }

    // kirim semua data ke view
    return view('products.index', compact('angka', 'hasil', 'message', 'type'));
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
