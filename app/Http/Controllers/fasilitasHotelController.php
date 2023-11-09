<?php

namespace App\Http\Controllers;

use App\Models\fasilitas_hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class fasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = fasilitas_hotel::where('nama_fasilitas', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = fasilitas_hotel::orderBy('id', 'desc')->paginate(10);
        }
        return view('hotel.fasilitasHotel')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.c_fasilitasHotel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_fasilitas', $request->nama_fasilitas);

        $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ],[
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi',
            'keterangan.required' => 'Nama fasilitas wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
        ]);
        $data = [
            'nama_fasilitas' => $request->nama_fasilitas,
            'keterangan' => $request->keterangan,
            'gambar' => $request->file('gambar')->getClientOriginalName(),
        ];

        fasilitas_hotel::create($data);
        return redirect()->to('fasilitas-hotel')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = fasilitas_hotel::where('id',$id)->first();
        return view('hotel.e_fasilitasHotel')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required',
        ],[
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi',
            'keterangan.required' => 'Nama fasilitas wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
        ]);
        $data = [
            'nama_fasilitas' => $request->nama_fasilitas,
            'keterangan' => $request->keterangan,
            'gambar' => $request->file('gambar')->getClientOriginalName(),
        ];

        fasilitas_hotel::where('id', $id)->update($data);
        return redirect()->to('fasilitas-hotel')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        fasilitas_hotel::where('id', $id)->delete();
        return redirect()->to('fasilitas-hotel')->with('success', 'Data berhasil terhapus');
    }
}
