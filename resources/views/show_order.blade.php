@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">{{ __('Order Detail') }}</div>
                @php
                $total_price = 0;
                @endphp
                <div class="card-body">
                    <!-- Menampilkan informasi order -->
                    <h5 class="card-title">Order ID {{ $order->id }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>
                    <!-- Menampilkan status pembayaran -->
                    @if ($order->is_paid == true)
                    <p class="card-text text-success"><i class="bi bi-info-circle"></i> Paid</p>
                    @else
                    <p class="card-text text-danger"><i class="bi bi-info-circle"></i> Unpaid</p>
                    @endif
                     <!-- Menampilkan detail transaksi -->
    <p class="text-muted">{{ $order->nama }} ({{ $order->telepon }}), {{ $order->provinsi }}, {{ $order->kota }}, {{ $order->alamat_lengkap }}</p>
    <p>Kurir: {{ $order->kurir }}</p>
    <p>Layanan: {{ $order->layanan }}</p>

    <hr>
                    
                    <!-- Menampilkan detail transaksi -->
                    @foreach ($order->transactions as $transaction)
                    <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                    @php
                    $total_price += $transaction->product->price * $transaction->amount;
                    @endphp
                    @endforeach
                    <hr>
                    <!-- Menghitung diskon dan total bayar -->
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
                    
                    <!-- Menampilkan informasi diskon dan total bayar -->
                    <p>Besaran Discount: {{ $disc }}</p>
                    <p>Diskon: Rp{{ $discount }}</p>
                    <p>Total Bayar: Rp{{ $total_bayar }}</p>
                    <hr>
        
                   

                    <!-- Form untuk submit bukti pembayaran -->
                    @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                    <form action="{{ route('submit_payment_receipt', $order)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                        <div class="form-group">
                        <label for="payment_receipt">Upload your payment receipt</label>
                                <input type="file" name="payment_receipt" id="payment_receipt" class="form-control">
                                <button type="submit" class="btn btn-primary mt-3 submit-btn">Submit payment</button>
                        </div>
                    </form>
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
