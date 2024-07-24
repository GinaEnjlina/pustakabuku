@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <!-- Card Header -->
                <div class="card-header">{{ __('Cart') }}</div>
                <div class="card-body ">
                    <!-- Menampilkan pesan kesalahan jika ada -->
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    @endif
                    <!-- Menghitung total harga belanja -->
                    @php
                    $total_price = 0;
                    $discount = 0;
                    $disc = '0%';
                    @endphp

                    <!-- Card Group untuk setiap item di keranjang -->
                    <div class="card-group m-auto">
                        @foreach ($carts as $index => $cart)
                        @if ($index % 4 == 0) 
                            <div class="row"> 
                        @endif
                        <div class="card-d col-md-3" >
                            <div class="card mb-2 mr-2 ml-2 p-2">
                            <img class="card-img-top " src="{{ url('storage/' . $cart->product->image) }}">
                            <div class="card-body">
                                <h6 class="card-title">{{ $cart->product->name }}</h6>
                                <!-- Form untuk mengupdate jumlah produk di cart -->
                                <form action="{{ route('update_cart', $cart) }}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2"
                                            name="amount" value={{ $cart->amount }}>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-warning text-dark" type="submit">Update
                                                </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form untuk menghapus produk dari cart -->
                                <form action="{{ route('delete_cart', $cart) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
</div>
                        </div>
                        <!-- Menghitung total harga belanja -->
                        @php
                        $total_price += $cart->product->price * $cart->amount;
                        @endphp
                        @endforeach
                    </div>
                    </div>
                    <hr>

                    <!-- Informasi total harga belanja -->
                    <div class="d-flex flex-column justify-content-end align-items-end">
                        @if ($total_price > 0)
                        @php
                        if ($total_price <= 200000) {
                            $discount = 0;
                            $disc = '0%';
                        } elseif ($total_price < 500000) {
                            $discount = 0.1 * $total_price;
                            $disc = '10%';
                        } else {
                            $discount = 0.2 * $total_price;
                            $disc = '20%';
                        }

                        $total_bayar = $total_price - $discount;
                        @endphp

                        <!-- Menampilkan total, diskon, dan total bayar -->
                        <p>Total: Rp. {{ $total_price }}</p>
                        <p>Besaran Discount : {{ $disc }}</p>
                        <p>Diskon : Rp. {{ $discount }}</p>
                        <p>Total Bayar : Rp. {{ $total_bayar }}</p>
                        </div>
                    @endif
                        </div>
            </div>
            

            <!-- Formulir untuk data pengiriman dan pembayaran -->
    <form action="{{ route('prosescheckout') }}" method="post">
        @csrf
        <br>
        <!-- Data Pengiriman -->
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telepon" name="telepon" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <br>
        <h5>Data Pengiriman</h5>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Alamat lengkap</label>
        <div class="form-group">
            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" required></textarea>
        </div>

        <br>
        <!-- Data Pembayaran -->
        <h5>Data Pembayaran</h5>
        <div class="form-group">
            <label for="kurir">Kurir</label>
            <select class="form-control" id="kurir" name="kurir" required>
                <option value="jne">JNE</option>
                <option value="SiCepat">SiCepat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="layanan">Jenis Pembayaran</label>
            <select class="form-control" id="layanan" name="layanan" required>
                <option value="virtual_account">Virtual Account/ATM</option>
                <option value="kartu_kredit">Kartu Kredit</option>
                <option value="indomaret">Indomaret</option>
                <!-- Tambahkan pilihan jenis layanan lainnya jika ada -->
            </select>
        </div>
        <!-- Tombol Checkout diluar kartu -->
        <div class="mt-3">
                
                    @csrf
                    <button type="submit" class="btn btn-warning" @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                
            </div>
        <!-- Tambahkan input untuk Total Pembayaran -->
        </div>
    </div>
</div>
@endsection