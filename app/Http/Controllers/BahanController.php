<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\bahan;
use validator;
use RealRashid\SweetAlert\Facades\Alert;


class BahanController extends Controller
{
    public function bahan()
    {
        $data_bahan = bahan::all();
        return view('admin.bahan',['data_bahan'=>$data_bahan]);
        
    }

    function showaddbahan()
    {
        $data_bahan = bahan::all();
        return view('admin.formbahan',['data_bahan'=>$data_bahan]);
    }

    public function addbahan(Request $req)
    {
        bahan::create([
            'nama' => $req->nama,
            'kode' => $req->kode,
            'jenis' => $req->jenis,
            'tempat_penyimpanan' => $req->tempat_penyimpanan,
            'jumlah' => $req->jumlah,
            // 'harga' => $req->harga,
            'satuan' => $req->satuan

        ]);

        Alert::success('Berhasil','Data telah ditambahkan')->persistent('Confirm');

        return redirect('/bahan');
    }

    public function store(Request $req)
    {
        $rules = [
            'kode' => 'required|unique:bahan,kode',
        ];
        $this->validate($req,$rules);

        // $input = $req->except('harga');
        // unset($input['_token']);
        // $status =\DB::table('bahan')->insert($input);

        $bahan = new bahan();
        $bahan->kode = $req->input('kode');
        $bahan->jenis = $req->input('jenis');
        $bahan->nama = $req->input('nama');
        $bahan->tempat_penyimpanan = $req->input('tempat_penyimpanan');
        $bahan->jumlah = $req->input('jumlah');
        $bahan->satuan = $req->input('satuan');
        $bahan->harga = "00000";
        $status = $bahan->save();

        if($status) {
            return redirect('/bahan')->with('success','Data Berhasil Ditambahkan');

        }else{
            return redirect('/bahan/create')->with('error','Data Gagal ditambahkan');
        }
        // dd($req->input());
    }

    public function editbahan($id)
    {
        $data_bahan = bahan::find($id);
        return view('admin.editbahan',['data_bahan' => $data_bahan]);
    }

    public function update($id, Request $req)
    {
        $data_bahan = bahan::find($id);
        $data_bahan->nama = $req->nama;
        $data_bahan->kode = $req->kode;
        $data_bahan->jenis = $req->jenis;
        $data_bahan->tempat_penyimpanan = $req->tempat_penyimpanan;
        $data_bahan->jumlah = $req->jumlah;
        $data_bahan->harga = $req->harga;
        $data_bahan->satuan = $req->satuan;

        $data_bahan->save();
        return redirect('/bahan');
    }

    public function deletebahan($id)
    {
        
        $data_bahan = bahan::find($id);
        $data_bahan->delete();
        Alert::success('Data berhasil dihapus!')->persistent('Confirm');
        return redirect('/bahan');

    } 

    public function detailpenggunaan()
    {
        return view('admin.detailpenggunaan');
    }

    public function chart()
    {
        return response()->json(bahan::all(), 200);
    }

    public function bahanmasuk()
    {
        $data_bahan = bahan::all();
        return view('admin.bahanmasuk',['data_bahan'=>$data_bahan]);
    }

    public function addbahanmasuk(Request $req)
    {
        $bahanmasuk = bahan::select('id','nama','jumlah')->get();
        $bahanmasuk->nama = $req->nama;
        $bahanmasuk->jumlah = $req->jumlah;
      
        $bahan = bahan::find($req->id);
        $bahan->jumlah = $bahan->jumlah + $req->jumlah;
        $bahan->save();
        
        alert()->success('Berhasil','Data telah ditambahkan');

        return redirect('/bahan');
    }
}
