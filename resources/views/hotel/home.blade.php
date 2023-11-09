@extends('template.layout')

@section('konten')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container" data-aos="fade-right">
  <form action="{{url('home')}}" class="row" method="POST">
    @csrf
    <div class="col form-group text-pink fw-bold">
      <label for="tgl_checkin">Tanggal Check In:</label>
      <input type="date" class="form-control" id="tgl_checkin" name="tgl_checkin">
    </div>
    <div class="col form-group text-pink fw-bold">
      <label for="tgl_checkout">Tanggal Check Out:</label>
      <input type="date" class="form-control" id="tgl_checkout" name="tgl_checkout">
    </div>
    <div class="col form-group text-pink fw-bold">
      <label for="jumlah_kamar">Jumlah Kamar:</label>
      <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar">
    </div>
    <a class="col-1 btn btn-transparent border-secondary text-pink fw-bold mt-auto pesan-btn" style="height: 40px">
        Pesan
    </a>

    <div class="none d-none text-pink mt-4">
      <div class="form-group">
        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan nama pemesan">
      </div>
      <div class="form-group mt-2">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
      </div>
      <div class="form-group mt-2">
        <label for="no_hp">No. Handphone:</label>
        <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor handphone">
      </div>
      <div class="form-group mt-2">
        <label for="nama_tamu">Nama Tamu:</label>
        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Masukkan nama tamu">
      </div>
      <div class="form-group mt-2">
        <label for="id_kamar">Tipe Kamar:</label>
        <select class="form-control" id="id_kamar" name="id_kamar">
          @foreach ($data_kamar as $dat)
          <option value="{{$dat->id}}">{{$dat->tipe_kamar}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-transparent border-secondary text-pink mt-2 float-end">Konfirmasi Pesanan</button>
    </div>
  </form>
</div>

<div class="container text-pink" data-aos="fade-left">
  <h3 class="mt-5 text-center fw-bold">Tentang Kami</h3>
  <p class="fw-light">Lepaskan diri anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau. Nikmati
    sore yang hangat dengan berenang di kolam renang dengan pemandangan keindahan matahari terbenam yang memukau. Kia's Club
    yang luas menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention Center
    kami dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3000 delegasi.
    Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.
  </p>
</div>

<script src="{{url('js/script.js')}}"></script>

@endsection