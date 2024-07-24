@extends('layouts.app')

@section('content')
<style>
  .carousel {
    border-radius: 10px;
    overflow: hidden;
  }


</style>

<div class="container">
  <!-- Carousel -->
  <div id="carouselPustaka" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselPustaka" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselPustaka" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselPustaka" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="height: 380px;"> 
      <div class="carousel-item active">
        <img src="storage/asset/h-1.jpg" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="storage/asset/h-3.jpg" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="storage/asset/h-2.jpg" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPustaka" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPustaka" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

 <!-- About Us Section -->
<section class="page-section pt-5 pb-5" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">About <span class="text-orange">Pustaka Buku<span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 text-center mx-auto">
        <p class="text-muted">"Pustaka Buku" adalah tempat keren buat kamu yang suka banget sama buku! Di sini, kamu bisa menemukan banyak buku dari berbagai jenis dan penulis terkenal. Kamu bisa dengan mudah menemukan buku-buku terbaru, yang klasik, fiksi, non-fiksi, dan masih banyak lagi. "Pustaka Buku" punya banyak pilihan untuk semua orang! Yuk, mulai pengalaman membacamu di "Pustaka Buku" sekarang juga! Setiap buku adalah pintu masuk ke dunia yang penuh pengetahuan, imajinasi, dan inspirasi. Ayo temukan buku yang kamu cari dan nikmati pengalaman membaca yang baru!
      </div>
    </div>
  </div>
</section>


<!-- Recommended Products Section -->
<section class="page-section" id="recommended-products">
  <div class="container-fluid">
  <div class="row col-lg-10 mx-auto">
      <div class="col-lg-6">
        <h2 class="section-heading">Recommended Products</h2>
      </div>
      <div class="col-lg-6 text-end">
        <a href="/product" class="btn text-purple">Lihat Semua</a>
      </div>
    </div>
    <div class="row col-lg-10 mx-auto">
      <!-- Product Cards -->
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
        <a href="{{ route('index_product') }}">
          <img class="card-img-top" src="storage/asset/b1.jpg" alt="Product 1"></a>
          <div class="card-body">
            <h5 class="card-title">Laut Bercerita Karya Leila S. Chudori</h5>
            <p class="card-text text-orange">Rp. 92000</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
        <a href="{{ route('index_product') }}">
          <img class="card-img-top" src="storage/asset/b2.jpg" alt="Product 2"></a>
          <div class="card-body">
            <h5 class="card-title">Alster Lake Karya Auryn Vientanla</h5>
            <p class="card-text text-orange">Rp. 89000</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
        <a href="{{ route('index_product') }}">
          <img class="card-img-top" src="storage/asset/b3.jpg" alt="Product 3" ></a>
          <div class="card-body">
            <h5 class="card-title">Hello Cello Karya Nadia Ristivani</h5>
            <p class="card-text text-orange">Rp. 89500</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</div>
@endsection

@push('scripts')
<script>
  $('.carousel').carousel({
    interval: 2000
  });
</script>
@endpush
