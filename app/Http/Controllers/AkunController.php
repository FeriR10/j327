<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Session;


class AkunController extends Controller
{
    public function index()
    {
        return view('admin.buatakun');
    }
   
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'kategori' => 'required',
            'detail' => 'required',
            'pajak' => 'required',
            'saldo_awal' => 'required',
            'deskripsi' => 'required',
            
        ]);

        $akun = new Akun();
        $akun->nama = $request->nama;
        $akun->nomor = $request->nomor;
        $akun->kategori = $request->kategori;
        $akun->detail = $request->detail;
        $akun->pajak = $request->pajak;
        $akun->saldo_awal = $request->saldo_awal;
        $akun->deskripsi = $request->deskripsi;
        
        $akun->save();
        Session::flash('status', 'success');
        Session::flash('message', 'Tambah Akun sukses');
        return redirect('/buatakun')->with('success', 'Akun Berhasil');
    }
}
