@extends('template.layout')

@section('konten')

<div class="mt-5 text-light">p</div>

@foreach ($data as $item)    

<div class="container text-light" data-aos="fade-right">
    <div class="bg-login rounded p-4">
        <img src="{{url("assets/".$item[0]->gambar)}}" alt="..." style="height: 60vh" class="d-flex mx-auto rounded">
    </div>
    <h3 class="mt-2 text-pink fw-bolder">{{$item[0]->tipe_kamar}}</h3>
    <h5 class="mt-3 text-pink fw-bold">Fasilitas:</h5>
    @foreach ($item as $dat)
    <h6 class="text-pink fw-normal">{{$dat->nama_fasilitas}}</h6>
    @endforeach
</div>
@endforeach




<script src="{{url('js/script.js')}}"></script>

@endsection