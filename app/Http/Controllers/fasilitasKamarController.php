<?php

namespace App\Http\Controllers;

use App\Models\fasilitas_kamar;
use App\Models\kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class fasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci)) {
            $data = DB::table('kamar')
                    ->join('fasilitas_kamar', 'kamar.id', '=', 'fasilitas_kamar.id_kamar')
                    ->select('*')
                    ->where('nama_fasilitas', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else {
            $data = DB::table('kamar')
                    ->join('fasilitas_kamar', 'kamar.id', '=', 'fasilitas_kamar.id_kamar')
                    ->select('*')
                    ->paginate(10);
        }
        return view('hotel.fasilitasKamar')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_kamar = kamar::orderBy('id', 'desc')->get();
        return view('hotel.c_fasilitasKamar')->with('data_kamar', $data_kamar);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_kamar', $request->id_kamar);
        Session::flash('nama_fasilitas', $request->nama_fasilitas);

        $request->validate([
            'id_kamar' => 'required',
            'nama_fasilitas' => 'required',
        ],[
            'id_kamar.required' => 'Nama kelas wajib diisi',
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi',
        ]);
        $data = [
            'id_kamar' =>$request->id_kamar,
            'nama_fasilitas' =>$request->nama_fasilitas,
        ];

        fasilitas_kamar::create($data);
        return redirect()->to('fasilitas-kamar')->with('success', 'Data berhasil tersimpan');
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
        $data_kamar = kamar::orderBy('id', 'desc')->get();
        $data = fasilitas_kamar::where('id',$id)->first();

        return view('hotel.e_fasilitasKamar')->with([
            'data' => $data,
            'data_kamar' => $data_kamar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kamar' => 'required',
            'nama_fasilitas' => 'required',
        ],[
            'id_kamar.required' => 'Nama kelas wajib diisi',
            'nama_fasilitas.required' => 'nama_fasilitas wajib diisi',
        ]);
        $data = [
            'id_kamar' =>$request->id_kamar,
            'nama_fasilitas' =>$request->nama_fasilitas,
        ];

        fasilitas_kamar::where('id', $id)->update($data);
        return redirect()->to('fasilitas-kamar')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        fasilitas_kamar::where('id', $id)->delete();
        return redirect()->to('fasilitas-kamar')->with('success', 'Data berhasil terhapus');
    }
}
