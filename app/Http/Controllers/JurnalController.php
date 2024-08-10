<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\Akun;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 


class JurnalController extends Controller
{
    public function index()
{
    $akun = Akun::all();
    $jurnal = Jurnal::all();

    // Menghitung total debit dan kredit, jika null atau kosong, set nilai ke 0
    $totalDebit = $jurnal->sum(function($jurnal) {
        return $jurnal->debit ?? 0;
    });

    $totalKredit = $jurnal->sum(function($jurnal) {
        return $jurnal->kredit ?? 0;
    });

    return view('admin.buatjurnal', compact('jurnal', 'totalDebit', 'totalKredit', 'akun'));
}

    public function create(Request $request)
{
    $request->validate([
        'no_transaksi' => 'required',
        'tanggal' => 'required',
        'tag' => 'required',
        'akun' => 'required',
        'deskripsi' => 'required',
        'debit' => 'required',
        'kredit' => 'required',
        'memo' => 'required',
        
        'datalainnya1' => 'nullable',
        'datalainnya2' => 'nullable',
        'datalainnya3' => 'nullable',
        'datalainnya4' => 'nullable',
        'lapiran' => 'nullable',
    ]);

    $jurnal = new Jurnal();
    $jurnal->no_transaksi = $request->no_transaksi;
    $jurnal->tanggal = $request->tanggal;
    $jurnal->tag = $request->tag;
    $jurnal->akun = $request->akun;
    $jurnal->deskripsi = $request->deskripsi;
    $jurnal->debit = $request->debit;
    $jurnal->kredit = $request->kredit;
    $jurnal->memo = $request->memo;
    $jurnal->datalainnya1 = $request->datalainnya1;
    $jurnal->datalainnya2 = $request->datalainnya2;
    $jurnal->datalainnya3 = $request->datalainnya3;
    $jurnal->datalainnya4 = $request->datalainnya4;

    // Ambil total_debit dan total_kredit yang sudah ada di database
    $existingTotalDebit = Jurnal::sum('debit');
    $existingTotalKredit = Jurnal::sum('kredit');

    // Jumlahkan debit dan kredit yang baru diinput dengan total_debit dan total_kredit yang sudah ada
    $jurnal->total_debit = $existingTotalDebit + $request->debit;
    $jurnal->total_kredit = $existingTotalKredit + $request->kredit;

    if($request->hasfile('lampiran')) {
        $file = $request->file('lampiran');
        $path = Storage::disk('public')->put('images/jurnal', $file);
        $jurnal->lampiran = $path;
        
    }
    $jurnal->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Jurnal Berhasil Dibuat');
    
    return redirect('/jurnal')->with('success', 'Jurnal Berhasil dibuat');
}


}
