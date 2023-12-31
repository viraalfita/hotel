@extends('template.layout')

@section('konten')

{{-- Form --}}
<div class="pt-3 bg-dark mt-2">

</div>
<form action="{{url('create/')}}" method="POST">
@csrf
<div class="mt-3 text-light">p</div>
<div class="card my-5 bg-form shadow-sm border-light">
    <div class="my-3 p-3 bg-form">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label text-light">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" value="{{Session::get('nama')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label text-light">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username" value="{{Session::get('username')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label text-light">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>
        <div class="mb-3 row">
        <label for="level" class="col-sm-2 col-form-label text-light">Level</label>
            <div class="col-sm-10">
                <select class="form-control" name='level' id="level">
                    <option value="admin">Admin</option>
                    <option value="resepsionis">Resepsionis</option>
                    <option value="tamu">Tamu</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-transparent border-light text-light" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection