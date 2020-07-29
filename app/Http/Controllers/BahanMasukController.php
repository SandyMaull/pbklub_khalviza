<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bahan;
use App\bahanMasuk;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class BahanMasukController extends Controller
{
    public function bahanmasuk()
    {
        $data_bahan = bahan::all();
        return view('admin.bahanmasuk',compact('data_data_bahan'));
    }

    function showaddjumlah()
    {
        $data_bahan = bahan::select('id','nama','jumlah')->get();
        $data_bahan2 = bahanMasuk::all()->where('nama_pengguna',auth()->user()->name);
        // $data_logbook2 = logbookPengguna::select('id','nama_bahan','jumlah')
                         
        //                     ->get();
        // dd($data_logbook2);
        return view('admin.bahanmasuk',['data_bahan'=>$data_bahan],['data_bahan2'=>$data_bahan2]);
    }

    public function addjumlah(Request $req)
    {

        $logbook = new bahanMasuk();
        $logbook->nama = $req->nama;
        $logbook->jumlah = $req->jumlah;
        $logbook->nama_pengguna = auth()->user()->name;
        $logbook->save();

        $bahan = bahan::find($req->nama);
        $bahan->jumlah = $bahan->jumlah + $req->jumlah;
        $bahan->save();
        
        alert()->success('Berhasil','Data telah ditambahkan');

        return redirect('/bahanmasuk');
    }
}
