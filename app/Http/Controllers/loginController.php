<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hotel.login');
    }

    public function login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            //sukses
            return redirect('/home');
        }else {
            return redirect('/')->withErrors('username atau password yang anda masukkan tidak valid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('hotel.daftar_akun');
    }

    public function register_tamu()
    {
        return view('hotel.daftar_akun_tamu');
    }

    public function create(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required | unique:users',
            'password' => 'required | min:6',
        ],[
            'username.unique' => 'Username sudah pernah digunakan',
            'password.min' => 'Minimal password 6 karakter',
        ]);

        $data = [
            'nama' =>$request->nama,
            'username' =>$request->username,
            'password' => Hash::make($request->password),
            'level' =>$request->level,
        ];
        User::create($data);

        return redirect()->to('kamar');

    }

    public function create_tamu(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required | unique:users',
            'password' => 'required | min:6',
        ],[
            'username.unique' => 'Username sudah pernah digunakan',
            'password.min' => 'Minimal password 6 karakter',
        ]);

        $data = [
            'nama' =>$request->nama,
            'username' =>$request->username,
            'password' => Hash::make($request->password),
            'level' =>$request->level,
        ];
        User::create($data);

        return redirect()->to('/')->with('success', 'Data berhasil tersimpan');

    }
}
