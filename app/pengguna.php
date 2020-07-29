<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $fillable = ['nama','email','pendidikan',
    'instansi','profil','password','username','user_id'];

    public function penggunaLog()
    {
        return $this->hasMany(logbookAnalis::class,'nama');
    }

    public function users()
    {
        return $this->hasOne(user::class,'role');
    }

    public function logbook()
    {
        return $this->hasMany(logbookPengguna::class, 'id');
    }
}
