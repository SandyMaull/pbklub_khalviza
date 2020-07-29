<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateProfileRequest;
//disini harusnya dideklarasiin model apa aja yang dibutuhin di controller ini, contoh : use App\tabel_user;
use App\user as t_user; //ini gw asumsiin nama tabel usernya tabel_user. ntar sesuain sama nama tabel usernya

class ProfilController extends Controller
{
    public function edit(Request $request)
    {
        return view('users.myprofil', [
            'user' => $request->user()
        ]);
    }
	
	
	public function showedit() 
	{
		$data = t_user::find(auth()->user()->id); 
		return view('users.myprofil')->with('data', $data);
	}

    public function update(Request $request) 
    {
		$put = t_user::find(auth()->user()->id);
		
		$put->name			= $request['name'];
		$put->email			= $request['email'];
		if($request->hasFile('profil'))
        {
            $request->file('profil')->move('admin/images/', $request->file('profil')->getClientOriginalName());
            $put->profil = $request->file('profil')->getClientOriginalName();
        }
		$put->save();
		
		return redirect('/profile'); 
    }

    
    

    // public function update(UpdateProfileRequest $request)
    // {
    //     $request->user()->update(
    //     $request->all()
    // );

    // return redirect()->route('profile.edit');
    // }
    
}
