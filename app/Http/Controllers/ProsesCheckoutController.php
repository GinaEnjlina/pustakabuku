<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProsesCheckoutController extends Controller
{
    public function prosescheckout(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'kurir' => 'required|string|max:255',
            'layanan' => 'required|string|max:255',
            'total_pembayaran' => 'required|numeric',
        ]);

        // Simpan pesanan ke dalam database
        $order = new Order();
        $order->nama = $request->nama;
        $order->telepon = $request->telepon;
        $order->email = $request->email;
        $order->provinsi = $request->provinsi;
        $order->kota = $request->kota;
        $order->alamat_lengkap = $request->alamat_lengkap;
        $order->kurir = $request->kurir;
        $order->layanan = $request->layanan;
        $order->total_pembayaran = $request->total_pembayaran;
        $order->save();

        // Simpan detail pesanan (item-item yang ada di keranjang) ke dalam database
        $carts = Cart::all();
        foreach ($carts as $cart) {
            $order->items()->create([
                'product_id' => $cart->product_id,
                'amount' => $cart->amount,
                'price' => $cart->product->price,
            ]);
            $cart->delete(); // Hapus item dari keranjang setelah diproses
        }

        // Redirect ke halaman sukses checkout atau lakukan tindakan sesuai kebutuhan
        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil diproses!');
    }

}
