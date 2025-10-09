<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // harus di-import supaya store() bisa jalan

class ProductController extends Controller
{
    // Method lama: form input angka
    public function form()
    {
        return view('products.form');
    }

    public function process(Request $request)
    {
        $angka = $request->input('angka');
        $hasil = $angka + 10;

        return redirect()->route('produk.angka', ['angka' => $angka]);
    }

    // Method baru: menampilkan form Master Product
    public function create()
    {
       return view('master-data.product-master.create'); 
    }

    // Method store untuk menyimpan data Product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string',
            'type' => 'required|string|max:255',
            'information' => 'nullable|string',
            'qty' => 'required|integer',
            'producer' => 'required|string|max:255',
        ]);

        Product::create($validated);

        return redirect()->route('master.product.create')->with('success', 'Product berhasil dibuat!');
    }

    // Method lama: logika angka ganjil-genap
    public function produk($angka)
    {
        $angka = (int) $angka;
        $hasil = $angka + 10;

        if ($angka % 2 == 0) {
            $message = "Nilai ini adalah genap";
            $type = "success";  
        } else {
            $message = "Nilai ini adalah ganjil";
            $type = "warning";
        }

        return view('products.index', compact('angka', 'hasil', 'message', 'type'));
    }

    // Method lama: menampilkan barang
    public function barang()
    {
        $barang   = "Laptop";
        $isi_data = "ASUS ROG 2025";

        return view('barang', compact('barang', 'isi_data'));
    }

    // Method lama: menampilkan produkk
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
