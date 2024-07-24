@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">{{ __('Product Detail') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img src="{{ url('storage/' . $product->image) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h1>{{ $product->name }}</h1>
                            <div>
                                <p class="text-secondary">Deskripsi</p>
                                <div id="description">
                                    <p>{!! nl2br(e($product->description)) !!}</p>
                                </div>
                                <!-- Tombol untuk toggle deskripsi -->
                                <button onclick="toggleDescription()" id="toggle-btn" class="btn text-primary" style="float: right">Read More </button>
                            </div>
                            <br>
                            <h3>Rp. {{ $product->price }}</h3>
                            <hr>
                            <p><span class="text-secondary">Available : </span>{{ $product->stock }} books</p>
                            <p>
                                Pengiriman Via JNE/SiCepat Sumedang Selatan
Instagram: @pustakabukustore
Line: @pustakabukustore
Whatsapp: 083122533393
Website: pustakabukustore.com
                            <!-- Form untuk menambahkan produk ke cart -->
                            @if (Auth::check() && Auth::user())
                                <!-- Tombol "Add to Cart" hanya untuk user yang sudah login -->
                                <form action="{{ route('add_to_cart', $product) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-warning text-dark" type="submit">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            @elseif (Auth::check() && Auth::user()->is_admin)
                                <!-- Tombol "Edit Product" hanya untuk admin -->
                                <form action="{{ route('edit_product', $product) }}" method="get">
                                    <button type="submit" class="btn btn-warning">Edit product</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <!-- Menampilkan pesan error jika ada -->
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS untuk mengatur tampilan deskripsi produk -->
<style>
#description {
    max-height: 200px; 
    overflow: hidden;
}
</style>

<!-- Script untuk toggle deskripsi -->
<script>
function toggleDescription(){
    var description = document.getElementById('description');
    var toggleBtn = document.getElementById('toggle-btn');

    if (description.style.maxHeight == '200px') {
        description.style.maxHeight = 'none';
        toggleBtn.textContent = 'Read Less';
    } else { 
        description.style.maxHeight = '200px'; 
        toggleBtn.textContent = 'Read More';
    }
}
</script>
@endsection
