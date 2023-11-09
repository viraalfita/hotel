<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_kamar = kamar::orderBy('id', 'desc')->get();
        return view('hotel.home')->with('data_kamar', $data_kamar);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tgl_checkin', $request->tgl_checkin);
        Session::flash('tgl_checkout', $request->tgl_checkout);
        Session::flash('jumlah_kamar', $request->jumlah_kamar);
        Session::flash('nama_pemesan', $request->nama_pemesan);
        Session::flash('email', $request->email);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('nama_tamu', $request->nama_tamu);
        Session::flash('id_kamar', $request->id_kamar);

        $request->validate([
            'tgl_checkin' => 'required',
            'tgl_checkout' => 'required',
            'jumlah_kamar' => 'required',
            'nama_pemesan' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'nama_tamu' => 'required',
            'id_kamar' => 'required',
        ],[
            'required' => 'Data wajib diisi',
        ]);
        $data = [
            'tgl_checkin' =>$request->tgl_checkin,
            'tgl_checkout' =>$request->tgl_checkout,
            'jumlah_kamar' =>$request->jumlah_kamar,
            'nama_pemesan' =>$request->nama_pemesan,
            'email' =>$request->email,
            'no_hp' =>$request->no_hp,
            'nama_tamu' =>$request->nama_tamu,
            'id_kamar' =>$request->id_kamar,
        ];

        reservasi::create($data);
        return redirect()->to('home')->with('success', 'Reservasi berhasil');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
