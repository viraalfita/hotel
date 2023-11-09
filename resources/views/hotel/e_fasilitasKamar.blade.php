@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-form mt-2">

</div>
<form action="{{url('fasilitas-kamar/'.$data->id)}}" method="POST">
@csrf
@method('PUT')
<div class="mt-3 text-light">p</div>

<div class="card my-5 bg-form shadow-sm">
    <div class="justify-content-start mt-4">
        <a href="{{url('fasilitas-kamar')}}" class="btn">
            <i class="ri-arrow-left-fill text-light" style="font-size: 24px"></i>
        </a>
    </div>
    <div class="my-3 p-3 bg-form">
        <div class="mb-3 row">
            <label for="id_kamar" class="col-sm-2 col-form-label text-light">Tipe Kamar</label>
            <div class="col-sm-10">
                <select class="form-control" id="id_kamar" name="id_kamar">
                    @foreach ($data_kamar as $dat)
                    <option value="{{$dat->id}}" {{$dat->id == $data->id_kamar ?'selected' :''}}>{{$dat->tipe_kamar}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_fasilitas" class="col-sm-2 col-form-label text-light">Nama Fasilitas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas" value="{{$data->nama_fasilitas}}">
            </div>
        </div>
        
        <div class="mb-3 row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-light" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection