<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Fungsi untuk menambahkan produk ke keranjang belanja
    public function add_to_cart(Product $product, Request $request)
    {
        // Validasi jumlah produk yang ditambahkan
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $product->stock
        ]);
        $user_id = Auth::id();
        $product_id = $product->id;
        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();
        // Jika produk belum ada di keranjang, tambahkan produk baru
        if ($existing_cart == null) {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        } else {
            // Jika produk sudah ada di keranjang, update jumlahnya
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->amount)
            ]);
            $existing_cart->update([
                'amount' => $existing_cart->amount + $request->amount
            ]);
        }
        return Redirect::route('show_cart');
    }

    // Fungsi konstruktor untuk menetapkan middleware auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Fungsi untuk menampilkan keranjang belanja
    public function show_cart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', compact('carts'));
    }

    // Fungsi untuk memperbarui jumlah produk di keranjang belanja
    public function update_cart(Cart $cart, Request $request)
    {
        // Validasi jumlah produk yang diperbarui
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);
        $cart->update([
            'amount' => $request->amount
        ]);
        return Redirect::route('show_cart');
    }

    // Fungsi untuk menghapus produk dari keranjang belanja
    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::back();
    }
}
