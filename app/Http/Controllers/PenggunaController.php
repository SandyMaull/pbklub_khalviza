<?php

namespace App\Http\Controllers;
use App\pengguna as t_guna;
use App\User as t_user;
use App\bahan as t_bahan;
use App\logbookPengguna as t_logbook;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    public function pengguna()
    {
        $data_pengguna = t_guna::all();
        return view('admin.peneliti',['data_pengguna'=>$data_pengguna]);
    }

    function showaddpengguna()
    {
        return view('admin.formpengguna');
    }

    public function addpengguna(Request $req)
    {
        $user=t_user::create([
         
        //insert into table pengguna    
            'name' =>$req->name,
            'email' => $req->email,
            'password' => bcrypt('biofarmaka'),
            'role' => 'pengguna'
        // 'bahan' => $req->bahan,
        // 'jumlah' => $req->jumlah
        ]);
        
        $pengguna = t_guna::create([
            'user_id'       => $user->id,
            'nama'          => $user->name,
            'email'         => $req->email,
            'pendidikan'    => $req->pendidikan,
            'instansi'      => $req->instansi
        ]);
        // 'instansi' => $req->instansi,
        //insert into table users
        // $user=new \App\user;
        // $user->role='pengguna';
        // $user->name = $req->nama;
        // $user->email = $req->email;
        // $user->password = bcrypt('biofarmaka');
        // $user->profil = $req->profil;
        // $user->rememberToken = str_random(60);
        // $user->save();

        Alert::success('Berhasil','Data telah ditambahkan');

        return redirect('/pengguna');
    }

    public function editpengguna($id)
    {
        $data_pengguna = t_guna::find($id);
        return view('admin.editpengguna',['data_pengguna' => $data_pengguna]);
    }

    public function update($id, Request $req)
    {
        // $this->validate($req, [
        //     'nama' => 'required',
        //     'kode' => 'required',
        //     'jenis' => 'required',
        //     'tempat_penyimpanan' => 'required',
        //     'jumlah' => 'required',
        //     'harga' => 'required'
        // ]);

        $data_pengguna = t_guna::find($id);
        $data_pengguna->nama = $req->nama;
        // $data_pengguna->username = $req->username;
        $data_pengguna->email = $req->email;
        $data_pengguna->nomorhp = $req->nomorhp;
        $data_pengguna->pendidikan = $req->pendidikan;
        $data_pengguna->instansi = $req->instansi;
        // $data_pengguna->profil = $req->profil;
        // $data_pengguna->password = $req->password;

        $data_pengguna->save();
        return redirect('/pengguna');
    }

    public function deletepengguna($id)
    {
        $data_pengguna = t_guna::find($id);
        $data_pengguna->delete();
        Alert::success('Data berhasil dihapus!')->persistent('Confirm');
        return redirect('/pengguna');
    }
    
    public function detail($id)
    {
        $idguna = t_guna::find($id);
        $idlogbook = t_logbook::where('nama_pengguna',$idguna->nama)->first()->id;
        $data_logbook = t_logbook::find($idlogbook);

        $idbahan = t_logbook::all()->where('nama_pengguna',$idguna->nama);
        return view('admin.detailpenggunaan',compact('idbahan'));
    }

    public function pdf()
    {
        $pdf = \PDF::loadView('detailpenggunaan', $data);
        return $pdf->donwload('invoice.pdf');
    }

}
