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

class OrderController extends Controller
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
        ]);

         // Mendapatkan ID pengguna yang sedang login
         $user_id = Auth::id();
        
         // Mendapatkan semua item dalam keranjang belanja untuk pengguna yang sedang login
         $carts = Cart::where('user_id', $user_id)->get();

        // Jika keranjang kosong, redirect kembali
        if ($carts->isEmpty()) {
            return Redirect::back();
        }

        // Simpan pesanan ke dalam database
        $order = Order::create([
            'user_id' => $user_id,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kurir' => $request->kurir,
            'layanan' => $request->layanan,
            
        ]);

        // Mengurangi stok produk dan membuat transaksi untuk setiap item dalam keranjang
        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id); 

            $product->update([
                'stock' => $product->stock - $cart->amount
            ]);

            Transaction::create([
                'amount' => $cart->amount,
                'order_id' => $order->id,
                'product_id' => $cart->product_id
            ]);
            
            // Menghapus item dari keranjang setelah transaksi selesai
            $cart->delete();   
        }

        // Redirect ke halaman daftar pesanan setelah checkout selesai
        return Redirect::route('index_order');

    }
    
     /**
     * Menampilkan daftar semua pesanan.
     *
     * @return \Illuminate\View\View
     */
    public function index_order()
    {
        // Mendapatkan informasi pengguna yang sedang login
        $user = Auth::user();
        $is_admin = $user->is_admin;
        
        // Mendapatkan semua pesanan, berbeda tergantung pada apakah pengguna adalah admin atau bukan
        if ($is_admin){
            $orders = Order::all();
        }else{
            $orders = Order::where('user_id',$user->id)->get();
        }
        
        // Mengirim data pesanan ke tampilan
        return view('index_order',compact('orders'));
    }
    
     /**
     * Menampilkan detail pesanan tertentu.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show_order(Order $order)
    {
        // Menampilkan halaman dengan detail pesanan tertentu
        return view('show_order', compact('order'));
    }

    /**
     * Mengirimkan bukti pembayaran untuk pesanan tertentu.
     *
     * @param  \App\Models\Order  $order
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit_payment_receipt(Order $order, Request $request)
    {
        // Mendapatkan file bukti pembayaran dari request
        $file = $request->file('payment_receipt');

        // Menyimpan file bukti pembayaran dengan nama yang unik di storage
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put(
            'public/' . $path,
            file_get_contents($file)
        );

        // Memperbarui informasi bukti pembayaran pada pesanan yang sesuai
        $order->update([
            'payment_receipt' => $path
        ]);

        // Kembali ke halaman sebelumnya
        return Redirect::back();
    }

    /**
     * Mengonfirmasi pembayaran untuk pesanan tertentu.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm_payment(Order $order)
    {
        // Memperbarui status pembayaran menjadi terkonfirmasi
        $order->update([
            'is_paid' => true
        ]);

        // Kembali ke halaman sebelumnya
        return Redirect::back();
    }

    public function NotaTransaksi(Order $order)
    {
        return view('nota', compact('order'));
    }
}
