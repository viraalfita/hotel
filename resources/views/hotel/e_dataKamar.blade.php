@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-form mt-2">

</div>
<form action="{{url('data-kamar/'.$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="mt-3 text-light">p</div>

<div class="card my-5 bg-form shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('data-kamar')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-form">
        <div class="mb-3 row">
            <label for="tipe_kamar" class="col-sm-2 col-form-label text-light">Tipe Kamar</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tipe_kamar" id="tipe_kamar" value="{{$data->tipe_kamar}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah_kamar" class="col-sm-2 col-form-label text-light">Jumlah Kamar</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="jumlah_kamar" id="jumlah_kamar" value="{{$data->jumlah_kamar}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label text-light">Gambar</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="gambar" id="gambar" value="{{Session::get('gambar')}}">
            </div>
        </div>
        <div class="mb-3 row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-secondary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection