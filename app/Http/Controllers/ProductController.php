<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    // Fungsi untuk menampilkan form pembuatan produk baru
    public function create_product()
    {
        return view('create_product');
    }

    // Fungsi untuk menyimpan produk baru ke database
    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->input('name') . '.' . $file->getClientOriginalExtension();

        // Simpan gambar produk ke penyimpanan
        $file->storeAs('public', $path);

        // Buat produk baru dalam database
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'description' => $request->input('description'),
            'image' => $path
        ]);

        return Redirect::route('index_product');
    }

    // Fungsi untuk menampilkan semua produk
    public function index_product()
    {
        $products = Product::all();
        return view('index_product', compact('products'));
    }

    // Fungsi untuk menampilkan detail produk
    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }

    // Fungsi untuk menampilkan form pengeditan produk
    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    // Fungsi untuk menyimpan perubahan pada produk yang diedit
    public function update_product(Product $product, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        // Simpan gambar produk ke penyimpanan lokal
        Storage::disk('local')->put(
            'public/' . $path,
            file_get_contents($file)
        );

        // Perbarui informasi produk dalam database
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        return Redirect::route('index_product', $product);
    }

    // Fungsi untuk menghapus produk
    public function delete_product(Product $product)
    {
        // Hapus produk dari database
        $product->delete();
        return Redirect::route('index_product');
    }

    public function search_product(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();
        return view('index_product', compact('products', 'query'));
    }

}
