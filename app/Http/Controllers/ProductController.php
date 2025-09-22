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
        $hasil = $angka + 10; // bebas tambahin angka lain

        return view('products.index', compact('angka', 'hasil'));
    }
}
