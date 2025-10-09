<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterProductController extends Controller
{
    public function index()
    {
        return view('master-data.product-master.index');
    }

    public function create()
    {
        return view('master-data.product-master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        return redirect()->route('master.product.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }
}
