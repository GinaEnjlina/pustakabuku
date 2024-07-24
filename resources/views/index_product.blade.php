@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4"> 
                <div class=" d-flex justify-content-between align-items-center">
                    <h4 class="text-orange">{{ __('Products') }}</h4>
                    @if (Auth::check() && Auth::user()->is_admin)
                        <a href="{{ route('create_product') }}" class="btn btn-purple">+ Add Product</a>
                    @endif
                </div>
                <p>Dapatkan potongan harga sampai 10% dangan membeli buku mulai dari 190k!</p>
                <hr>
                <div class="card-body">
   

    <!-- Form pencarian -->
    <!-- Form pencarian -->
<form action="{{ route('search_products') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Cari judul buku">
        <div class="input-group-append">
            <button type="submit" class="btn btn-warning"><i class="bi bi-search"></i> Search</button>
        </div>
    </div>
</form>


    <div class="row">
        @foreach ($products as $index => $product)
                            @if ($index % 4 == 0) 
                                </div><div class="row"> 
                            @endif
                            <div class="card-d col-md-3"> 
                                <div class="card mb-4 mr-2 ml-2 p-2 utama "> 
                                <a href="{{ route('show_product', $product) }}"> 
                                        <img class="card-img-top" src="{{ url('storage/' .$product->image) }}" alt="Card image cap">
                                    </a>
                                    <div class="card-body p-3"> 
                                        <p class="card-text">{{ $product->name }}</p>
                                        <h5 class="card-text text-orange">Rp.{{ $product->price }}</h5>
                                        
                                        @if (Auth::check() && Auth::user()->is_admin)
                                        <hr>
                                        <form action="{{ route('show_product', $product) }}" method="get">
                                            <button type="submit" class="btn btn-success " style="width: 100%;">Show More</button>
                                        </form>
                                        
                                            <form action="{{ route('delete_product', $product) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-2" style="width: 100%;">Delete Product</button>
                                            </form>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .utama:hover {
    box-shadow: 0 6px 10px rgba(1, 0, 0, 0.2); 
    transition: box-shadow 0.3s ease; 
}
</style>
@endsection
