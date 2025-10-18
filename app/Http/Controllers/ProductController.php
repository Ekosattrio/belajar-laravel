<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        // Middleware: hanya admin & owner yang boleh akses
        $this->middleware(function ($request, $next) {
            if (!in_array(Auth::user()->role, ['admin', 'owner'])) {
                abort(403, 'Akses ditolak.');
            }
            return $next($request);
        });
    }

    // ===============================
    // === MASTERDATA CRUD SECTION ===
    // ===============================

    // === READ: tampilkan semua produk ===
    public function index()
    {
        $products = Product::with('category')->get();
        return view('master-data.product-master.index', compact('products'));
    }

    // === CREATE: form tambah produk ===
    public function create()
    {
        $categories = Category::all();
        return view('master-data.product-master.create', compact('categories'));
    }

    // === STORE: simpan produk baru ===
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:100',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:0',
            'producer' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()->route('master.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // === EDIT: form edit produk ===
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('master-data.product-master.edit', compact('product', 'categories'));
    }

    // === UPDATE: simpan perubahan produk ===
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'type' => 'required|string|max:100',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:0',
            'producer' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($validated);

        return redirect()->route('master.product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // === DELETE: hapus produk ===
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('master.product.index')->with('success', 'Produk berhasil dihapus.');
    }

    // === TAMBAHAN UNTUK TOMBOL ==== 

    public function form()
    {
        return view('products.form');
    }

    public function process(Request $request)
    {
        return back()->with('success', 'Produk berhasil diproses.');
    }

    public function barang()
    {
        $products = Product::with('category')->get();
        return view('products.barang', compact('products'));
    }

    public function produkk()
    {
        $products = Product::all();
        return view('products.produkk', compact('products'));
    }

    public function produk($angka)
    {
        return view('products.produk', compact('angka'));
    }
}
