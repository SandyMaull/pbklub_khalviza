<?php

namespace App\Http\Controllers;
Use App\user as t_user;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\logbookPengguna as t_logbook;
use App\bahan as t_bahan;
use Auth;

class UserController extends Controller
{
    public function home()
    {
        if(auth()->user()->role == 'admin')
        {
                $internal=count(t_user::where(function ($query){
                $query->where('role','admin');
                $query->orWhere('role','analis');
                $query->orWhere('role','manager_teknik');
                })->get());
    
                $eksternal=count(t_user::where(function ($query){
                    $query->where('role','pengguna');
                    })->get());
    
                $bahan=count(t_bahan::all());
    
                $warning=count(t_bahan::all()
                ->where('jumlah','<','500')
                );

                // $urut=t_bahan::select('id','nama','tempat_penyimpanan','jumlah','satuan')
                // ->orderBy('jumlah','ASC')
                // ->limit(10)
                // ->get();

                $urut=t_bahan::select('id','nama','tempat_penyimpanan','jumlah','satuan')
                ->where('jumlah','<','500')
                ->get();
                

                $bahans = \App\bahan::all();
                $categories = [];
                $jumlah = [];

                foreach($bahans as $b){
                    $categories[] = $b->nama;
                    $jumlah[] = $b->jumlah;
                }

                return view('admin.dashboard',compact('urut'))->with('internal',$internal)->with('eksternal',$eksternal)
                ->with('bahan',$bahan)->with('warning',$warning)->with('categories',$categories)->with('jumlah',$jumlah);
        }
        elseif(auth()->user()->role == 'manager_teknik')
        {
            $internal=count(t_user::where(function ($query){
                $query->where('role','admin');
                $query->orWhere('role','analis');
                $query->orWhere('role','manager_teknik');
                })->get());
    
                $eksternal=count(t_user::where(function ($query){
                    $query->where('role','pengguna');
                    })->get());
    
                $bahan=count(t_bahan::all());
    
                $warning=count(t_bahan::all()
                ->where('jumlah','<','20')
                );

                // $urut=t_bahan::select('id','nama','tempat_penyimpanan','jumlah','satuan')
                // ->orderBy('jumlah','ASC')
                // ->limit(10)
                // ->get();

                $urut=t_bahan::select('id','nama','tempat_penyimpanan','jumlah','satuan')
                ->where('jumlah','<','500')
                ->get();
    
                return view('managerteknik.dashboard',compact('urut'))->with('internal',$internal)->with('eksternal',$eksternal)
                ->with('bahan',$bahan)->with('warning',$warning);
        }
        elseif(auth()->user()->role == 'analis' || auth()->user()->role == 'pengguna')
        {
            $data_logbook = t_bahan::select('id','nama','jumlah')->get();
            $data_logbook2 = t_logbook::all()->where('nama_pengguna',auth()->user()->name);
            return view('users.logbook', compact('data_logbook', 'data_logbook2'));
        }
    }
    public function user()
    {
        $data_user = t_user::all();
        return view('admin.user',['data_user'=>$data_user]);
    }

    function showadduser()
    {
        $data_user = t_user::all();
        return view('admin.formuser',['data_user'=>$data_user]);
    }

    public function adduser(Request $req)
    {

        //insert into table user
        $user=t_user::create([
           
        'role' =>$req->role,
        'name' =>$req->name,
        'email' => $req->email,
        'nomorhp' => $req->nomorhp,
        'profil' => $req->profil,
        'password' => Hash::make($req->password)

        ]);

        if($req->hasFile('profil'))
        {
            $req->file('profil')->move('admin/images/', $req->file('profil')->getClientOriginalName());
            $user->profil = $req->file('profil')->getClientOriginalName();
            $user->save();
        }

        Alert::success('Berhasil','Data telah ditambahkan');
        return redirect('/user');
    }

    public function edituser($id)
    {
        $data_user = t_user::find($id);
        return view('admin.edituser',['data_user' => $data_user]);
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

        $data_user = t_user::find($id);
        $data_user->name = $req->name;
        $data_user->email = $req->email;

        $data_user->save();
        return redirect('/user');
    }

    public function deleteuser($id)
    {
        $data_user = t_user::find($id);
        $data_user->delete();
        return redirect('/user');
    }

    function gantipass()
    {
        $user = t_user::find(auth()->user()->id);

        return view('users.gantipassword')->with('user', $user);
    }

    function updatepass(Request $req)
    {
        $passlama = $req->input('oldpass');
        $user = t_user::find(auth()->user()->id);

        $checkpass = Hash::check($passlama, $user->password);
        if($checkpass == '1')
        {
            $user->password = Hash::make($req['password']);
            $user->save();

            return redirect('/profile')->with('successnewpass', '1');
        }
        else
        {
            return redirect('/gantipass')->with('erroroldpass', 'Does not match');
        }
    
    }
   
    public function logbook()
    {
        return view ('users.logbook');
    }
}
