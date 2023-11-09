<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use Illuminate\Http\Request;

class dataTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $tanggalkunci = $request->tanggalkunci;
        $jumlahbaris = 10 ;
        if (strlen($katakunci) || $tanggalkunci) {
            $data = reservasi::where('nama_tamu', 'like', "%$katakunci%")
                    ->whereDate('tgl_checkin', '=', $tanggalkunci)
                    ->paginate($jumlahbaris);
        }else {
            $data = reservasi::orderBy('id', 'desc')->paginate(10);
        }
        return view('hotel.dataTamu')->with('data', $data);
    }

    public function checkin(string $id)
    {
        reservasi::where('id',$id)->update([
            'is_checkin' => 1
        ]);
        return redirect()->to('/data-tamu');
    }

    public function checkout(string $id)
    {
        reservasi::where('id',$id)->update([
            'is_checkin' => 0
        ]);
        return redirect()->to('/data-tamu');
    }
}
