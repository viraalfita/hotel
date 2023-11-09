@extends('template.layout')

@section('konten')

<div class="container">
    <div class="pt-3 mt-5">

    </div>
    <div class="card rounded shadow-sm bg-login border-light my-5">
        <div class="card-header">
            <h1 class="text-pink fw-bolder">Data Tamu</h1>
        </div>
        <div class="card-body">
            <div class="my-2 p-3 bg-light rounded">
                {{-- Pencarian --}}
                <div class="pb-3">
                    <form action="{{url('data-tamu')}}" class="d-flex" method="get">
                        <input type="date" class="form-control me-5" name="tanggalkunci" value="{{ Request::get('tanggalkunci') }}" >
                        <input type="search" class="form-control ms-5" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-transparent" type="submit">
                            <i class="ri-search-2-line text-primary" style=""></i>
                        </button>
                    </form>
                </div>
    
                <table class="table table-secondary table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-1 text-center">No</th>
                            <th class="col-md-2 text-center">Nama Tamu</th>
                            <th class="col-md-2 text-center">Tanggal Check In</th>
                            <th class="col-md-2 text-center">Tanggal Check Out</th>
                            <th class="col-md-2 text-center">Status</th>
                            <th class="col-md-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomer = 1; ?>
                        @foreach ($data as $dat)
                        <tr>
                            <td>{{$nomer++}}</td>
                            <td>{{$dat->nama_tamu}}</td>
                            <td>{{$dat->tgl_checkin}}</td>
                            <td>{{$dat->tgl_checkout}}</td>
                            <td class="text-center">
                                @if ($dat->is_checkin == 0)
                                    Check Out
                                @else
                                    Check In
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($dat->is_checkin == 0 )
                                <a href='{{url('/checkin/'.$dat->id)}}' class="btn btn-transparent border-success text-dark btn-sm">
                                    CHECK IN
                                </a>
                                @else
                                <a href='{{url('/checkout/'.$dat->id)}}' class="btn btn-transparent border-danger text-dark btn-sm">
                                    CHECK OUT
                                </a>
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
@foreach ($data as $dat)   
<div class="modal fade" id="modalDelete_{{$dat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Peringatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin akan menghapus data?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <form action="{{url('data-kamar/'.$dat->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark text-light">Ya</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endforeach

@endsection