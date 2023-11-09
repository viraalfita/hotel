<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dataKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = kamar::where('tipe_kamar', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = kamar::orderBy('id', 'desc')->paginate(10);
        }
        return view('hotel.dataKamar')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.c_dataKamar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tipe_kamar', $request->tipe_kamar);
        Session::flash('jumlah_kamar', $request->jumlah_kamar);

        $request->validate([
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'gambar' => 'required',
        ],[
            'tipe_kamar.required' => 'Nama kelas wajib diisi',
            'jumlah_kamar.required' => 'jumlah_kamar wajib diisi',
            'gambar.required' => 'gambar wajib diisi',
        ]);
        $data = [
            'tipe_kamar' =>$request->tipe_kamar,
            'jumlah_kamar' =>$request->jumlah_kamar,
            'gambar' =>$request->gambar,
        ];

        kamar::create($data);
        return redirect()->to('data-kamar')->with('success', 'Data berhasil tersimpan');
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
        $data = kamar::where('id',$id)->first();
        return view('hotel.e_dataKamar')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Session::flash('tipe_kamar', $request->tipe_kamar);
        Session::flash('jumlah_kamar', $request->jumlah_kamar);

        $request->validate([
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',
        ],[
            'tipe_kamar.required' => 'Nama kelas wajib diisi',
            'jumlah_kamar.required' => 'jumlah_kamar wajib diisi',
        ]);
        $data = [
            'tipe_kamar' =>$request->tipe_kamar,
            'jumlah_kamar' =>$request->jumlah_kamar,
        ];

        kamar::where('id', $id)->update($data);
        return redirect()->to('data-kamar')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kamar::where('id', $id)->delete();
        return redirect()->to('data-kamar')->with('success', 'Data berhasil terhapus');
    }
}
