@extends('template.layout')

@section('konten')

<div class="mt-5 text-light">p</div>

<div class="container" data-aos="fade-up">
    <div id="carouselAutoplaying" class="carousel slide bg-login rounded p-5 d-flex" style="height: 90vh" data-bs-ride="carousel">
      <div class="carousel-inner rounded">
        <div class="carousel-item active">
          <img src="{{url('assets/hotel1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{url('assets/hotel3.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{url('assets/hotel2.JPEG')}}" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>

<div class="container text-light" data-aos="fade-right">
    <h3 class="mt-2">Fasilitas</h3>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  @foreach ($data as $item)
    <div class="col">
      <div class="card h-100 bg-login border-light" data-aos="fade-left">
        <img src="{{url('assets/'.$item->gambar)}}" class="m-3" alt="...">
        <div class="card-body">
          <h5 class="card-title text-light text-center">{{$item->nama_fasilitas}}</h5>
        </div>
      </div>
    </div>
  @endforeach
</div>

<script src="{{url('js/script.js')}}"></script>

@endsection